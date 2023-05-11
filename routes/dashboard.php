<?php

use Illuminate\Support\Facades\Route;

/* Dashboard Routes */

Route::post('/store_token', 'HomeController@storeToken')->name('store_token')->middleware('auth');

Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['dashboard']], function () {
    // Agora
    Route::get('/agora-chat', 'AgoraVideoController@index');
    Route::post('/agora/token', 'AgoraVideoController@token');
    Route::post('/agora/call-user', 'AgoraVideoController@callUser');
    // Landing
    Route::name('dashboard')->get('/', 'HomeController@index');
    // Admins
    Route::resource('admins', 'AdminsController');
    // Users
    Route::resource('users', 'UsersController');
    Route::name('users.approved')->post('users/{user}/approved', 'UsersController@approved');
    // Video Calls
    Route::resource('video_calls', 'VideoCallsController', ['except' => 'show']);
    // Faqs
    Route::resource('faqs', 'FaqsController', ['except' => 'show']);
    // Lists
    Route::get('cities_list', 'TasksController@cities')->name('cities_list');
    Route::get('areas_list', 'TasksController@areas')->name('areas_list');
    // Reports
    // Calls
    Route::get('calls_report', 'ReportsController@callsReport')->name('calls_report');
    Route::get('calls_chart', 'ReportsController@callsChart')->name('calls_chart');
    Route::post('calls_export', 'ReportsController@callsExport')->name('calls_export');
    Route::get('current_status', 'ReportsController@currentStatus')->name('current_status');
    Route::get('agents_report', 'ReportsController@agentsReport')->name('agents_report');
    Route::get('users_report', 'ReportsController@usersReport')->name('users_report');
    Route::get('users/{user}/user_calls', 'ReportsController@userCalls')->name('user_calls');
    Route::get('waiting_time', 'ReportsController@waitingTimes')->name('waiting_time');
    Route::post('waiting_time_export', 'ReportsController@waitingTimesExport')->name('waiting_time_export');
    // Contacts
    Route::resource('contacts', 'ContactsController', ['only' => ['index', 'show', 'destroy']]);
    /* ====== About =======*/
    Route::name('abouts.edit')->get('abouts/edit', 'AboutsController@edit');
    Route::name('abouts.update')->patch('abouts/edit', 'AboutsController@update');
    // User Cities
    Route::resource('cities', 'CitiesController', ['except' => 'show']);
    // User Areas
    Route::resource('cities.areas', 'AreasController', ['except' => 'show']);
    // Working Hours
    Route::resource('working_hours', 'WorkingHoursController', ['except' => 'show']);
    // Settings
    Route::name('settings.edit')->get('settings/edit', 'SettingsController@edit');
    Route::name('settings.update')->patch('settings/edit', 'SettingsController@update');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('dashboard_login', 'AuthController@loginForm')->name('login_form');
    Route::post('dashboard_logged', 'AuthController@login')->name('admin_logged');
    Route::post('dashboard_logout', 'AuthController@logout')->name('admin_logout');
});
