<?php

namespace App\Http\Controllers\Admin;

use App\Cognito\CognitoClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $filter = $request->get('search');
        $users = User::where('role', 'client')->search($filter)->paginate(15);
        //return response()->json(['data' => $users]);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        app()->make(CognitoClient::class)->register($request->email, $request->password,
            ['name' => $request->name, 'custom:role' => 'client']);
        // Confirm Account
        app()->make(CognitoClient::class)->confirmAccount($request->email);

        $user = User::create($request->except('password') + ['approved' => true,
                'password' => bcrypt($request->input('password'))
            ]);

        return redirect()->route('admin.users.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        if ($request->filled('password') && $user->password != $request->get('password')) {
            $user->update($request->except('password') + [
                    'password' => bcrypt($request->input('password')),
                ]);
        } else {
            $user->update($request->except('password'));
        }

        return redirect()->route('admin.users.index')->with('success', 'Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if (count($user->videoCalls)) {
            return redirect()->back()->withErrors('Can\'t delete this user Please Deactivate !');
        } else {
            app()->make(CognitoClient::class)->deleteAccount($user->email);
            $user->delete();

            return redirect()->route('admin.users.index')->with('success', 'Deleted Successfully !');
        }
    }
}
