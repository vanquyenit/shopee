<?php
/*
|--------------------------------------------------------------------------
| Env
|--------------------------------------------------------------------------
 */
Route::get('/get-env', ['as' => 'getEnv', 'uses' => 'DashboardController@getEnv']);
Route::post('/get-env', ['as' => 'saveEnv', 'uses' => 'DashboardController@saveEnv']);
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
 */
//dashboard
Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);

//category
Route::get('/category', ['as' => 'category', 'uses' => 'CategoryController@index']);
Route::get('/category/create', ['as' => 'category-create', 'uses' => 'CategoryController@create']);
Route::post('/category/save', ['as' => 'category-save', 'uses' => 'CategoryController@save']);
Route::get('/category/edit/{id}', ['as' => 'category-edit', 'uses' => 'CategoryController@edit']);
Route::post('/category/update/{id}', ['as' => 'category-update', 'uses' => 'CategoryController@update']);

//User
Route::get('/user', ['as' => 'user', 'uses' => 'UserController@index']);
Route::get('/user/create', ['as' => 'user-create', 'uses' => 'UserController@create']);
Route::post('/user/save', ['as' => 'user-save', 'uses' => 'UserController@save']);
Route::get('/user/edit/{id}', ['as' => 'user-edit', 'uses' => 'UserController@edit']);
Route::post('/user/update/{id}', ['as' => 'user-update', 'uses' => 'UserController@update']);
/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
 */
Route::group(['as' => 'ajax.'], function () {
    Route::post('category/delete', ['as' => 'category-delete', 'uses' => 'AjaxController@categoryDelete']);
    Route::post('user/delete', ['as' => 'user-delete', 'uses' => 'AjaxController@userDelete']);
});