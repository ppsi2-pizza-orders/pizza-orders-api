<?php


Route::middleware('auth:api')->group(function () {

    Route::get('/debug/check_auth', function () {
        echo 'Auth works!';
    });
});