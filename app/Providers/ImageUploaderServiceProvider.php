<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\ImageUploaderInterface as ImageUploader;

use App\Http\Controllers\MainRestaurant\RestaurantController;
use App\Http\Controllers\MainRestaurant\IngredientController;
use App\Http\Controllers\MainRestaurant\PizzaController;

use App\Services\RestaurantImageUploader;
use App\Services\PizzaImageUploader;
use App\Services\IngredientImageUploader;

class ImageUploaderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app
            ->when(RestaurantController::class)
            ->needs( ImageUploader::class)
            ->give(function() {
                return new RestaurantImageUploader();
            });

        $this->app
            ->when(PizzaController::class)
            ->needs( ImageUploader::class)
            ->give(function() {
                return new PizzaImageUploader();
            });

        $this->app
            ->when(IngredientController::class)
            ->needs( ImageUploader::class)
            ->give(function() {
                return new IngredientImageUploader();
            });
    }

    public function register(): void {}
}