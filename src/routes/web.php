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


use Illuminate\Support\Facades\Route;

Route::post('/perfumes','ParfumController@store')->name('perfumes');
Route::get('/','ParfumController@index')->name('/');

//Route::get('/perfume', function () {
//    return view('my_parfume');
//});
