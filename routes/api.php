<?php


Route::middleware('auth:api')->group(function () {
    Route::get('/debug/check_auth', function () {
        echo 'Auth works!';
    });
});

Route::post('auth/facebook', 'Auth\AuthController@handleFacebookAuth');
Route::post('auth/register', 'Auth\AuthController@register');