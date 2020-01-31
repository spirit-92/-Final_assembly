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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','RouteBookController@index')->name('/');

Route::get('/books','RouteBookController@store')->name('books');

Route::get('/book/{id}','RouteBookController@show')->name('book');
Route::delete('/bookDelete/{id}', 'RouteBookController@destroy')->name('delete');;
Route::get('/bookUpdate/{id}', 'RouteBookController@edit')->name('bookUpdate');
Route::put('/PutBook/{id}', 'RouteBookController@update')->name('PutBook');
Route::get('/searchBook', 'RouteBookController@searchBook')->name('searchBook');

Route::get('/AddReader','ReaderController@index')->name('AddReader');
Route::get('/PostReader','ReaderController@store')->name('PostReader');
