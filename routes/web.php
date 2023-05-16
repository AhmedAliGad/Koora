<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('front/welcome');
})->name('landing');

/*--------pages-------*/
Route::get('/profile', function () {
    return view('front/pages/profile');
})->name('profile');

Route::get('/about', function () {
    return view('front/pages/about');
})->name('about');

Route::get('/page', function () {
    return view('front/pages/page');
})->name('page');
/*-----blog----*/
Route::get('/blog', function () {
    return view('front/blog/index');
})->name('blog');

Route::get('/blog/view', function () {
    return view('front/blog/view');
})->name('show-blog');

// Route::view('/', 'welcome');
Route::redirect('/home', '/dashboard');
Route::view('privacy-policy', 'privacy-policy')->name('privacy-policy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
