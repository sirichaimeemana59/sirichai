<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {

    Route::get('logout', 'AuthController@logout');
    Route::get('user-info', 'AuthController@getUser');
});
//Register
Route::post('user/register_form','UserController\UserController@store');


