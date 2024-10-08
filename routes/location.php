<?php

use Illuminate\Support\Facades\Route;

Route::prefix('places')->group(function() {
    Route::get('', 'PlaceController@index');
    Route::post('', 'PlaceController@store');
    Route::get('{id}', 'PlaceController@show');
    Route::put('{id}', 'PlaceController@update');
    Route::delete('{id}', 'PlaceController@destroy');
});
