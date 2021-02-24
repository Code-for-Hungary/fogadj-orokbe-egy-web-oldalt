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
   return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
use Illuminate\Http\Request;
// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Github login
Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);

// -----------------------------forget password ------------------------------
Route::get('forget-password', function() {
	return view('welcome' , ["msg" => __('login.emailSended'), "msgClass" => "alert-success"]);
});
Route::post('forget-password', function() {
	return view('auth/passwords/email');
});

Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');

Route::get('emailverifyform', 'App\Http\Controllers\EmailVerifyController@form');
Route::get('sendemailverify/{email}', 'App\Http\Controllers\EmailVerifyController@send');
Route::get('doemailverify/{token}', 'App\Http\Controllers\EmailVerifyController@do');
Route::get('construction', function(Request $request) {
	return view('construction');
});
Route::get('cookieenable', 'App\Http\Controllers\CookieController@set1');
Route::get('cookiedisable','App\Http\Controllers\CookieController@set0');
Route::get('textpage/{name}', 'App\Http\Controllers\TextpageController@show');
Route::get('bugreportform', 'App\Http\Controllers\BugreportController@form');
Route::post('bugreportsend', 'App\Http\Controllers\BugreportController@send');


