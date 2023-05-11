<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VideoCall;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoCallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/video_calls",
     *      operationId="video_call_request",
     *      tags={"Video Calls"},
     *      summary="Video Call Request",
     *      security={{"Bearer":{}}},
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        if (auth()->check() && auth()->user()->role == 'client') {
            $call = VideoCall::create(['user_id' => auth()->id(), 'call_status_id' => 1,
                'channel_name' => Str::random()]);
            if ($call) {
                $agent = User::where([['role', 'agent'], ['status', 'active']])->first();
                if ($agent) {
                    $call->update(['admin_id' => $agent->id]);
                    $agent->update(['status' => 'in_call']);
                    $this->sendPushNotification('Novo Care', 'New Incoming Call', [$agent->device_token]);
                }
            }

            return response()->json(['data' => ['message' => 'Call is created Successfully',
                'channel_name' => $call->channel_name, 'call_id' => $call->id]], 200);
        } else {
            return response()->json(['message' => 'Invalid user'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCall $videoCall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoCall $videoCall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="/video_calls/{id}",
     *      operationId="end_call",
     *      tags={"Video Calls"},
     *      summary="End Call Api",
     *      security={{"Bearer":{}}},
     *     @OA\Parameter(
     *         description="Call ID",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"rating", "waiting_time", "duration_time", "call_status_id"},
     *                  @OA\Property(
     *                      property="rating",
     *                      type="integer",
     *                      description="Call Rating"
     *                  ),
     *                  @OA\Property(
     *                      property="waiting_time",
     *                      type="integer",
     *                      description="Call Waiting Time"
     *                  ),
     *                  @OA\Property(
     *                      property="duration_time",
     *                      type="integer",
     *                      description="Call Duration Time"
     *                  ),
     *                  @OA\Property(
     *                      property="call_status_id",
     *                      type="integer",
     *                      description="Call Status 3 Canceled and 5 Finished",
     *                      enum={"5", "3"}
     *                  ),
     *                  @OA\Property(
     *                      property="_method",
     *                      default="put",
     *                      type="sting",
     *                   )
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
     * @param Request $request
     * @param VideoCall $videoCall
     * @return JsonResponse|void |JsonResponse
     */
    public function update(Request $request, VideoCall $videoCall)
    {
        if (auth()->id() == $videoCall->user_id) {
            if ($videoCall->status_id == 5) {
                $videoCall->update(['rating' => $request->rating,
                    'waiting_time' => $request->waiting_time, 'duration_time' => $request->duration_time,
                    'actual_time' => $request->duration_time - $request->waiting_time]);
            } else {
                $videoCall->update(['status_id' => $request->call_status_id, 'rating' => $request->rating,
                    'waiting_time' => $request->waiting_time, 'duration_time' => $request->duration_time,
                    'actual_time' => $request->duration_time - $request->waiting_time]);
                $videoCall->admin ? $videoCall->admin()->update(['status' => 'active']) : '';
            }

            return response()->json(['message' => 'Call updated'], 200);
        } else {
            return response()->json(['message' => 'Invalid user'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoCall $videoCall)
    {
        //
    }
}
