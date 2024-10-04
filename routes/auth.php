<?php

use Illuminate\Support\Facades\Route;

Route::post('sign-in', 'AuthController@signIn');
Route::middleware('auth:api')->group(function () {
    Route::post('refresh-token', 'AuthController@refreshToken');
});