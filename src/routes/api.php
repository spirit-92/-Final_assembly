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

Route::post('/register','Api\RegisterController@register')->name('register');
Route::post('/token','Api\AuthController@getToken')->name('get_token');

Route::middleware('auth_api')->group(function (){
    Route::get('/weather','Api\WeatherController@index')->name('weather_list');
});
