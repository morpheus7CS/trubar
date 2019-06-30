<?php

Route::namespace('Admin')
    ->prefix('trubar')
    ->middleware('auth')
    ->group(function () {
        Route::get('posts', 'TrubarPostController@index')->name('posts.index');
        Route::get('posts/{id}', 'TrubarPostController@show')->name('posts.show');
        Route::post('posts', 'TrubarPostController@store')->name('posts.store');
});

// Catch-all Route...
Route::get('/{view?}', 'SPAViewController@index')->name('spa');
