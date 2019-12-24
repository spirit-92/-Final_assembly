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

Route::get('/', function () {
    return view('form');
});
Route::resource('rest','RestRouteController')->names('restTest');


//Route::resource('restTest.store','RestRouteController@store')->names('restTest2');

Route::post('/rest2', function ($sd) {
    return 'sd';
});


