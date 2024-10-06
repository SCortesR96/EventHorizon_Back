<?php

use Illuminate\Support\Facades\Route;


Route::prefix('plans')->group(function () {
    Route::get('', 'PlanController@index');
    Route::post('', 'PlanController@store');
    Route::get('{id}', 'PlanController@show');
    Route::put('{id}', 'PlanController@update');
    Route::delete('{id}', 'PlanController@destroy');

    Route::prefix('products')->group(function () {
        Route::get('', 'PlanProductController@index');
        Route::post('', 'PlanProductController@store');
        Route::get('{id}', 'PlanProductController@show');
        Route::put('{id}', 'PlanProductController@update');
        Route::delete('{id}', 'PlanProductController@destroy');
    });
});
