<?php

namespace App\Http\Controllers\Admin;

use App\Cognito\CognitoClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Models\Admin;
use App\Models\AdminLog;
use App\Models\User;
use App\Models\VideoCall;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException;
use Aws\Credentials\Credentials;
use Carbon\Carbon;
use Throwable;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
        return view('auth.admin.login');
    }

    public function login(AdminLoginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']), $request->get('remember'))) {
            return redirect()->route('admin.dashboard')
                             ->with('success', 'Welcome '.auth()->user()->name);
        } else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login_form');
    }
}
