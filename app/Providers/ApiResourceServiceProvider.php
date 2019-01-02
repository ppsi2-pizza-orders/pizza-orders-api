<?php

namespace App\Providers;

use App\Http\Controllers\ApiResourceController;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\ApiResourceInterface;
use App\Http\Resources\ApiResource;

use App\Http\Controllers\MainRestaurant\RestaurantController;
use App\Http\Resources\Restaurant\RestaurantResource;

use App\Http\Controllers\MainRestaurant\RestaurantListController;
use App\Http\Resources\Restaurant\RestaurantListResource;

use App\Http\Controllers\MainRestaurant\RestaurantOwnerController;
use App\Http\Resources\Restaurant\RestaurantPermissionsResource;

use App\Http\Controllers\Admin\RestaurantController as RestaurantAdminController;
use App\Http\Resources\Admin\RestaurantsTable;

use App\Http\Controllers\Admin\IngredientController as IngredientAdminController;
use App\Http\Resources\Admin\IngredientsTable;

use App\Http\Controllers\Admin\UserController as UserAdminController;
use App\Http\Resources\Admin\UsersTable;

use App\Http\Controllers\Admin\OrderController as OrderAdminController;
use App\Http\Resources\Admin\OrdersTable;

use App\Http\Controllers\MainRestaurant\IngredientController;
use App\Http\Resources\Restaurant\IngredientResource;

use App\Http\Controllers\MainRestaurant\ReviewController;
use App\Http\Resources\ReviewResource;

use App\Http\Controllers\MainRestaurant\PizzaController;
use App\Http\Resources\Restaurant\PizzaFullResource;

use App\Http\Controllers\Order\OrderController;
use App\Http\Resources\Order\OrderResource;

class ApiResourceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app
            ->when(ApiResourceController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new ApiResource();
            });

        $this->app
            ->when(RestaurantController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new RestaurantResource();
            });

        $this->app
            ->when(RestaurantListController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new RestaurantListResource();
            });

        $this->app
            ->when(RestaurantOwnerController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new RestaurantPermissionsResource();
            });

        $this->app
            ->when(RestaurantAdminController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new RestaurantsTable();
            });

        $this->app
            ->when(IngredientAdminController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new IngredientsTable();
            });

        $this->app
            ->when(UserAdminController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new UsersTable();
            });

        $this->app
            ->when(IngredientController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new IngredientResource();
            });

        $this->app
            ->when(ReviewController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new ReviewResource();
            });

        $this->app
            ->when(PizzaController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new PizzaFullResource();
            });

        $this->app
            ->when(OrderController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new OrderResource();
            });

        $this->app
            ->when(OrderAdminController::class)
            ->needs(ApiResourceInterface::class)
            ->give(function() {
                return new OrdersTable();
            });
    }

    public function register(): void {}
}