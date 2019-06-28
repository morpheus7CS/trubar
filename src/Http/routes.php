<?php

// Catch-all Route...
Route::get('/{view?}', 'SPAViewController@index')->name('spa');
