<?php

Route::namespace('Admin')
    ->prefix('trubar')
    ->middleware('auth')
    ->group(function () {
        Route::get('posts', 'TrubarPostController@index')->name('posts.index');
        Route::get('posts/{id}', 'TrubarPostController@show')->name('posts.show');
        Route::put('posts/{id}', 'TrubarPostController@update')->name('posts.update');
        Route::delete('posts/{id}', 'TrubarPostController@delete')->name('posts.delete');
        Route::put('posts/{id}/restore', 'TrubarPostController@restore')->name('posts.restore');
        Route::post('posts', 'TrubarPostController@store')->name('posts.store');
});

Route::namespace('Admin\Auth')
->prefix('trubar')
->group(function () {
    // Registration Routes...
    Route::post('register', 'RegisterController@register')->name('register');
    Route::post('login', 'LoginController@login')->name('login');
});

// Catch-all Route...
Route::get('/{view?}', 'SPAViewController@index')->name('spa');
