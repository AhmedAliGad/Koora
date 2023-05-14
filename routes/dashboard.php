<?php

use Illuminate\Support\Facades\Route;

/* Dashboard Routes */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::post('/store_token', 'HomeController@storeToken')->name('store_token')->middleware('auth');

Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['dashboard']], function () {

    // Sliders
    Route::resource('sliders', 'SlidersController');
    // Photo Gallery
    Route::resource('photo_galleries', 'PhotoGalleriesController');
    // Partners
    Route::resource('partners', 'PartnersController');
    // News
    Route::resource('news_lists', 'NewsListsController');
    // Teams
    Route::resource('teams', 'TeamsController');
    // UpComing Matches
    Route::resource('upcoming_matches', 'UpcomingMatchesController');
    // Contacts
    Route::resource('contact_messages', 'ContactMessagesController', ['only' => ['index', 'show', 'destroy']]);

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
