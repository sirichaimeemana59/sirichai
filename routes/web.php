<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::any('/product', function () {
    return dd('dd');
});

Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {

    Route::get('logout', 'AuthController@logout');
    Route::get('user-info', 'AuthController@getUser');
});
//Register
//Route::post('user/register_form','UserController\UserController@store');
//Language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
//Product
//Route::get('product/product_list','Product\ProductController@index');

