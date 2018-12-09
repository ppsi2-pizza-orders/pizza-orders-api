<?php

Route::middleware('auth:api')->group(function () {
    Route::get('/debug/check_auth', function () {
        echo 'Auth works!';
    });

    Route::post('restaurant', 'MainRestaurant\RestaurantController@store'); // check
    Route::patch('restaurant/{id}', 'MainRestaurant\RestaurantController@update'); // check
    Route::delete('restaurant/{id}', 'MainRestaurant\RestaurantController@destroy'); // check

    Route::post('restaurant/{id}/pizza', 'MainRestaurant\PizzaController@store'); //check
    Route::patch('pizza/{id}', 'MainRestaurant\PizzaController@update'); // check
    Route::delete('pizza/{id}', 'MainRestaurant\PizzaController@destroy'); // check

    Route::post('ingredient', 'MainRestaurant\IngredientController@store'); // check
    Route::patch('ingredient/{id}', 'MainRestaurant\IngredientController@update'); // check
    Route::delete('ingredient/{id}', 'MainRestaurant\IngredientController@destroy'); // check

    Route::post('restaurant/{id}/review', 'MainRestaurant\ReviewController@store'); // check
    Route::delete('review/{id}', 'MainRestaurant\ReviewController@destroy'); // check

    Route::get('admin/restaurants', 'Admin\RestaurantController@index'); // check
    Route::get('admin/ingredients', 'Admin\IngredientController@index'); // check
    Route::get('admin/users', 'Admin\UserController@index'); // check
});

Route::post('auth/facebook', 'Auth\AuthController@facebookLogin'); // check
Route::post('auth/register', 'Auth\AuthController@register'); // check
Route::post('auth/login', 'Auth\AuthController@login'); // check

Route::get('restaurants', 'MainRestaurant\RestaurantController@index'); // check
Route::post('restaurants', 'MainRestaurant\RestaurantListController@search'); // check remember
Route::get('restaurant/{id}', 'MainRestaurant\RestaurantController@show'); // check
