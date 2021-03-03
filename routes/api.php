<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api'], function ($router) {

    Route::group(['namespace' => 'Customer\Auth', 'prefix' => 'auth'], function ($router) {
        Route::post('/login', 'CustomerAuthController@login');
        Route::post('/register', 'CustomerAuthController@register');


        Route::group(['middleware' => 'auth:customer-api'], function ($router) {
            Route::get('logout', 'CustomerAuthController@logout');
            Route::post('refresh', 'CustomerAuthController@refresh');
        });
  
        Route::post('register-token', 'CustomerAuthController@RegisterToken');
    
    });
    Route::get('/home','HomeController@home');
    Route::post('/stores','StoresController@index');
    Route::post('/products','ProductsController@index');
    Route::post('/products/{id}','ProductsController@show');


    

});