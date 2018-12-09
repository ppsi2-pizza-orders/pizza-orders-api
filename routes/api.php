<?php

Route::middleware('auth:api')->group(function () {
    Route::get('/debug/check_auth', function () {
        echo 'Auth works!';
    });

    Route::post('restaurant', 'MainRestaurant\RestaurantController@store'); // check doc
    Route::patch('restaurant/{id}', 'MainRestaurant\RestaurantController@update'); // check doc
    Route::delete('restaurant/{id}', 'MainRestaurant\RestaurantController@destroy'); // check doc

    Route::post('restaurant/{id}/pizza', 'MainRestaurant\PizzaController@store'); //check doc
    Route::patch('pizza/{id}', 'MainRestaurant\PizzaController@update'); // check doc
    Route::delete('pizza/{id}', 'MainRestaurant\PizzaController@destroy'); // check doc

    Route::post('ingredient', 'MainRestaurant\IngredientController@store'); // check doc doc
    Route::patch('ingredient/{id}', 'MainRestaurant\IngredientController@update'); // check doc
    Route::delete('ingredient/{id}', 'MainRestaurant\IngredientController@destroy'); // check doc

    Route::post('restaurant/{id}/review', 'MainRestaurant\ReviewController@store'); // check
    Route::delete('review/{id}', 'MainRestaurant\ReviewController@destroy'); // check

    Route::get('admin/restaurants', 'Admin\RestaurantController@index'); // check doc
    Route::get('admin/ingredients', 'Admin\IngredientController@index'); // check doc
    Route::get('admin/users', 'Admin\UserController@index'); // check doc
});

Route::post('auth/facebook', 'Auth\AuthController@facebookLogin'); // check doc
Route::post('auth/register', 'Auth\AuthController@register'); // check doc
Route::post('auth/login', 'Auth\AuthController@login'); // check doc

Route::get('restaurants', 'MainRestaurant\RestaurantController@index'); // check doc
Route::post('restaurants', 'MainRestaurant\RestaurantListController@search'); // check doc
Route::get('restaurant/{id}', 'MainRestaurant\RestaurantController@show'); // check doc
