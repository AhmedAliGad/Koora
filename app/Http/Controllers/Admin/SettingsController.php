<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * @var Setting
     */
    private $setting;

    public function __construct()
    {
        $this->middleware('dashboard');
        $this->setting = Setting::first();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $users = Admin::where('id', '!=', auth()->guard('admin')->id())->get();

        return view('admin.settings.edit', ['setting' => $this->setting, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->setting->update($request->input());

        return redirect()->route('admin.settings.edit')->with('success', 'Updated Successfully !');
    }
}
