<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('generate-link');
});

Route::get('generate-link', 'UrlShortenerController@index')->name('generate.link');
Route::post('generate-link', 'UrlShortenerController@store')->name('generate.link.post');
Route::get('{code}', 'UrlShortenerController@getNormal')->name('normal.link');
