<?php

Route::middleware('auth:api')->group(function () {

    Route::middleware('admin')->group(function () {
        Route::get('admin/restaurants', 'Admin\RestaurantController@index');
        Route::get('admin/users', 'Admin\UserController@index');
        Route::get('admin/orders', 'Admin\OrderController@index');
        Route::get('admin/ingredients', 'Admin\IngredientController@index');
        Route::post('admin/restaurant/{id}/publish', 'Admin\RestaurantController@publish');
        Route::post('admin/restaurant/{id}/hide', 'Admin\RestaurantController@hide');
        Route::post('ingredient', 'MainRestaurant\IngredientController@store');
        Route::patch('ingredient/{id}', 'MainRestaurant\IngredientController@update');
        Route::delete('ingredient/{id}', 'MainRestaurant\IngredientController@destroy');
    });

    Route::middleware('owner')->group(function () {
        Route::delete('restaurant/{id}', 'MainRestaurant\RestaurantController@destroy');

        Route::patch('restaurant/{id}', 'MainRestaurant\RestaurantController@update');
        Route::post('restaurant/{id}/grant', 'MainRestaurant\RestaurantOwnerController@grant');
        Route::delete('restaurant/{id}/revoke/{user_id}', 'MainRestaurant\RestaurantOwnerController@revoke');
        Route::post('restaurant/{id}/publish/request', 'MainRestaurant\RestaurantOwnerController@request');
        Route::post('restaurant/{id}/publish/cancel', 'MainRestaurant\RestaurantOwnerController@cancel');
        Route::post('restaurant/{id}/pizza', 'MainRestaurant\PizzaController@store');
        Route::delete('pizza/{id}', 'MainRestaurant\PizzaController@destroy');
        Route::patch('pizza/{id}', 'MainRestaurant\PizzaController@update');
    });

    Route::middleware('manager')->group(function () {
        Route::post('restaurant/{id}/manage', 'MainRestaurant\RestaurantManagerController@manage');
    });

    Route::middleware('chief')->group(function () {
        Route::post('order/{token}/status/next', 'Order\OrderController@setNextStatus');
        Route::get('restaurant/{id}/orders', 'Order\OrderController@restaurantOrders');
    });

    Route::post('restaurant', 'MainRestaurant\RestaurantController@store');

    Route::post('restaurant/{id}/review', 'MainRestaurant\ReviewController@store');
    Route::delete('review/{id}', 'MainRestaurant\ReviewController@destroy');

    Route::post('order', 'Order\OrderController@placeOrder');
    Route::get('order/{token}', 'Order\OrderController@show');
});

Route::post('auth/facebook', 'Auth\AuthController@facebookLogin');
Route::post('auth/register', 'Auth\AuthController@register');
Route::post('auth/login', 'Auth\AuthController@login');
Route::post('auth/refresh', 'Auth\AuthController@refreshToken');

Route::get('restaurants', 'MainRestaurant\RestaurantController@index');
Route::post('restaurants', 'MainRestaurant\RestaurantListController@search');
Route::get('restaurant/{id}', 'MainRestaurant\RestaurantController@show');
Route::get('restaurant/{id}/ingredients', 'MainRestaurant\RestaurantManagerController@ingredients');

