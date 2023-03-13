<?php

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

Route::group(['namespace' => 'Auth', 'prefix' => 'author'], function () {
    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@login']);
    Route::post('/post-login', 'LoginController@postLogin');
    Route::get('/logout', 'LoginController@logout');
    Route::post('/forgot-password', 'ForgotPasswordController@sendMail');
    Route::get('/change-password/{id}', 'ResetPasswordController@getPassword');
    Route::post('/change-password/{id}', 'ResetPasswordController@change');
    Route::get('auth/{provider}', 'RegisterController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'RegisterController@handleProviderCallback');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    require __DIR__ . '/admin.php';
});
