<?php

namespace App\Http\Controllers\Admin;

use App\Cognito\CognitoClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Mail\LoginInviteMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('search');
        $admins = User::whereIn('role', ['admin', 'agent'])->search($filter)->paginate(15)->withQueryString();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        app()->make(CognitoClient::class)->register($request->email, $request->password,
            ['name' => $request->name, 'custom:role' => $request->role]);
        // Confirm Account
        app()->make(CognitoClient::class)->confirmAccount($request->email);
        $admin = User::create($request->except('password') + [
                'password' => bcrypt($request->input('password'))
            ]);
        if ($admin) {
            Mail::to($request->email)->send(new LoginInviteMail($request->only(['name', 'email', 'password'])));
        }

        return redirect()->route('admin.admins.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdminRequest  $request
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, User $admin)
    {
        if ($request->filled('password') && $admin->password != $request->get('password')) {
            $admin->update($request->except('password') + [
                    'password' => bcrypt($request->input('password')),
                ]);
        } else {
            $admin->update($request->except('password'));
        }

        return redirect()->route('admin.admins.index')->with('success', 'Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        if (count($admin->videoCalls)) {
            return redirect()->back()->withErrors('Can\'t delete this member Please Deactivate !');
        } else {
            app()->make(CognitoClient::class)->deleteAccount($admin->email);
            $admin->delete();

            return redirect()->route('admin.admins.index')->with('success', 'Deleted Successfully !');
        }
    }
}
