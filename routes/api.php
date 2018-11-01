<?php

Route::middleware('auth:api')->group(function () {
    Route::get('/debug/check_auth', function () {
        echo 'Auth works!';
    });
});

Route::post('auth/facebook', 'Auth\AuthController@facebookLogin');
Route::post('auth/register', 'Auth\AuthController@register');
Route::post('auth/login', 'Auth\AuthController@login');

Route::post('restaurants', 'MainRestaurant\RestaurantController@search');
Route::get('restaurant/{id}', 'MainRestaurant\RestaurantController@show');
Route::post('restaurant', 'MainRestaurant\RestaurantController@store');
Route::patch('restaurant/{id}', 'MainRestaurant\RestaurantController@update');
Route::delete('restaurant/{id}', 'MainRestaurant\RestaurantController@destroy');

Route::post('restaurant/{id}/pizza', 'MainRestaurant\PizzaController@store');
Route::patch('pizza/{id}', 'MainRestaurant\PizzaController@update');
Route::delete('pizza/{id}', 'MainRestaurant\PizzaController@destroy');