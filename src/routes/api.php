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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/register','Api\RegistrationController@register')->name('register');
Route::post('/authorise','Api\AuthoriseController@auth')->name('authorise');
Route::middleware('auth_api')->group(function (){
    Route::get('/books','Api\BooksController@index')->name('book_list');
});
