<?php

namespace App\Http\Controllers\API;

use App\Cognito\CognitoClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ForgetPasswordRequest;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\LogoutRequest;
use App\Http\Requests\API\ResetPasswordRequest;
use App\Http\Resources\API\UserResource;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->client = app()->make(CognitoClient::class);
    }
    /**
     * @OA\Post(
     *      path="/login",
     *      operationId="login_user",
     *      tags={"Sign"},
     *      summary="Login",
     *      description="Login User",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"email", "password", "device_os", "device_token"},
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="User Email"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                      description="User Password"
     *                  ),
     *                  @OA\Property(
     *                      property="device_os",
     *                      type="string",
     *                      enum={"android", "ios"},
     *                      default="android",
     *                      description="User Device OS"
     *                  ),
     *                  @OA\Property(
     *                      property="device_token",
     *                      type="string",
     *                      description="User Device Token For Push Notification"
     *                  ),
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     * @param LoginRequest $request
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = auth()->attempt($request->only(['email', 'password']));
        if ($user) {
            if (auth()->user()->active) {
                $token = auth()->user()->createToken('myapptoken')->plainTextToken;
                auth()->user()->update($request->only(['device_token', 'device_os']) + ['status' => 'active']);
                $logCheck = UserLog::whereDate('created_at', Carbon::today())->first();
                if ($logCheck) {
                    $login_times = $logCheck->login_times ?: [];
                    array_push($login_times, Carbon::now()->format('d-m-Y g:i A'));
                    $logCheck->update(['login_times' => $login_times]);
                } else {
                    UserLog::create(['user_id' => auth()->id(),
                        'login_times' => [Carbon::now()->format('d-m-Y g:i A')]]);
                }
                return (new UserResource(auth()->user()))->additional([
                    'meta' => [
                        'token' => (string)$token
                    ],
                ]);
            } else {
                auth()->user()->update(['device_token' => null]);
                return response()->json(['message' => 'Your account is pending.'], 422);
            }
        } else {
            return response()->json(['message' => 'These credentials do not match our records.'], 422);
        }
    }

    /**
     * @OA\Post(
     *      path="/logout",
     *      operationId="logout_user",
     *      tags={"Sign"},
     *      summary="Loogout",
     *      description="Loogout User",
     *      security={{"Bearer":{}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"password"},
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                      description="User Password"
     *                  ),
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     * @param LogoutRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(LogoutRequest $request)
    {
        if (!Hash::check($request->input('password'), auth()->user()->password)) {
            return response()->json(['message' => 'Invalid Password'], 422);
        } else {
            $user = auth()->user();
            $this->client->logOut($user->email);
            $user->update(['device_token' => null, 'status' => 'sing_out']);
            $user->currentAccessToken()->delete();
            //auth()->user()->tokens()->delete();

            return response()->json(['message' => 'Logged out'], 200);
        }
    }

    public function confirmAccountPassword(Request $request)
    {
        return $this->client->confirmPassword($request->email, $request->password);
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $user = $this->client->getUser($request->email);
        if ($user) {
            if ($user['UserStatus'] == 'CONFIRMED') {
                if ($this->client->sendResetLink($request->email)) {
                    return response()->json(['message' => __('passwords.sent')], 200);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => $user['UserStatus']], 422);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found !'], 422);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = $this->client->getUser($request->email);
        if ($user) {
            if (($user['UserStatus'] == 'CONFIRMED') ||
                ($user['UserStatus'] == 'RESET_REQUIRED')) {
                try {
                    return $this->client->resetPassword($request);
                } catch (\Throwable $e) {
                    return response()->json(['message' => $e->getMessage()], 422);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => $user['UserStatus']], 422);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found !'], 422);
        }
    }
}
