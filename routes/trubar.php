<?php

/*
|--------------------------------------------------------------------------
| Trubar CMS Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return "Hello Trubar";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');