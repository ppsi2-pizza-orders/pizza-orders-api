<?php

Route::middleware('auth:api')->group(function () {
    Route::get('/debug/check_auth', function () {
        echo 'Auth works!';
    });

    Route::post('restaurant', 'MainRestaurant\RestaurantController@store');
    Route::patch('restaurant/{id}', 'MainRestaurant\RestaurantController@update');
    Route::delete('restaurant/{id}', 'MainRestaurant\RestaurantController@destroy');

    Route::post('restaurant/{id}/pizza', 'MainRestaurant\PizzaController@store');
    Route::delete('pizza/{id}', 'MainRestaurant\PizzaController@destroy');

    Route::post('ingredient', 'MainRestaurant\IngredientController@store');
    Route::patch('ingredient/{id}', 'MainRestaurant\IngredientController@update');
    Route::delete('ingredient/{id}', 'MainRestaurant\IngredientController@destroy');

    Route::post('restaurant/{id}/review', 'MainRestaurant\ReviewController@store');
    Route::delete('review/{id}', 'MainRestaurant\ReviewController@destroy');

    Route::get('admin/restaurants', 'Admin\RestaurantController@index');
    Route::get('admin/ingredients', 'Admin\IngredientController@index');
    Route::get('admin/users', 'Admin\UserController@index');

    Route::post('restaurant/{id}/grant', 'MainRestaurant\RestaurantOwnerController@grant');
    Route::post('restaurant/{id}/revoke/{user_id}', 'MainRestaurant\RestaurantOwnerController@revoke');
});

Route::post('auth/facebook', 'Auth\AuthController@facebookLogin');
Route::post('auth/register', 'Auth\AuthController@register');
Route::post('auth/login', 'Auth\AuthController@login');

Route::get('restaurants', 'MainRestaurant\RestaurantController@index');
Route::post('restaurants', 'MainRestaurant\RestaurantListController@search');
Route::get('restaurant/{id}', 'MainRestaurant\RestaurantController@show');
Route::get('restaurant/{id}/rating', 'MainRestaurant\RestaurantRatingController@average');
