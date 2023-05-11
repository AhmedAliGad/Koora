<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VideoCall;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role == 'agent') {
            return view('admin.agent');
        } else {
            return view('admin.index');
        }
    }
}
