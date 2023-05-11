<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Admin::get();

        return view('home', compact('users'));
    }

    public function storeToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token, 'device_os' => 'web']);

        return response()->json(['token saved successfully.']);
    }
}
