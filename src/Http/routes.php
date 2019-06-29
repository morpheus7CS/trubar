<?php


Route::namespace('Admin')->prefix('trubar')->group(function (){
   Route::get('posts', 'TrubarPostController@index')->name('posts.index');
   Route::get('posts/{id}', 'TrubarPostController@show')->name('posts.show');
});

// Catch-all Route...
Route::get('/{view?}', 'SPAViewController@index')->name('spa');
