<?php

Route::middleware('auth:api')->group(function () {
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

    Route::get('admin/logs', 'Admin\LogController@index');
    Route::get('admin/restaurants', 'Admin\RestaurantController@index');
    Route::get('admin/ingredients', 'Admin\IngredientController@index');
    Route::get('admin/users', 'Admin\UserController@index');
    Route::get('admin/orders', 'Admin\OrderController@index');

    Route::post('order', 'Order\OrderController@placeOrder');
    Route::get('order/{token}', 'Order\OrderController@show');
    Route::post('order/{token}/status/next', 'Order\OrderController@setNextStatus');
    Route::get('restaurant/{id}/orders', 'Order\OrderController@restaurantOrders');

    Route::post('restaurant/{id}/grant', 'MainRestaurant\RestaurantOwnerController@grant');
    Route::delete('restaurant/{id}/revoke/{user_id}', 'MainRestaurant\RestaurantOwnerController@revoke');
});

Route::post('auth/facebook', 'Auth\AuthController@facebookLogin');
Route::post('auth/register', 'Auth\AuthController@register');
Route::post('auth/login', 'Auth\AuthController@login');
Route::post('auth/refresh', 'Auth\AuthController@refreshToken');

Route::get('restaurants', 'MainRestaurant\RestaurantController@index');
Route::post('restaurants', 'MainRestaurant\RestaurantListController@search');
Route::get('restaurant/{id}', 'MainRestaurant\RestaurantController@show');

