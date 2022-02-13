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



Route::group(['middleware'=>['auth:api']],function(){
    Route::get('news','PostController@index');
    Route::post('news','PostController@store');
    Route::get('news/{id}','PostController@show');
    Route::put('news/{id}','PostController@update');
    Route::delete('news','PostController@destroy');
    Route::get('newspost','PostController@create')->name('posts');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('tags','TagController@index');
Route::post('tags','TagController@store');


