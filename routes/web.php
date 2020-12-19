<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//
//],
//function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
//});

//Register
Route::post('user/register_form','App\Http\Controllers\UserController\UserController@store');


