<?php

use Illuminate\Http\Request;

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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('challenges', 'ChallengeController');

Route::post('/challenges/{challenge}', 'FlagAuthentication@checkFlag')->name('challenges.check_flag');

Route::get('/', 'MainController@index')->name('main');
