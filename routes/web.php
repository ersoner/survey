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

Route::group(['/'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
});

Route::group(['prefix' =>  'user'], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::post('/create', 'UserController@store')->name('user.create');
});

Route::group(['prefix' =>  'question'], function () {
    Route::get('/', 'QuestionController@index')->name('question.index');
    Route::post('/', 'QuestionController@store')->name('answer.create');
});

Route::group(['prefix' =>  'result'], function () {
    Route::get('/', 'ResultController@index')->name('result.index');
});
