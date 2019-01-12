<?php

Route::get('/', function () {
    echo 'App works!';
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth.basic.admin');