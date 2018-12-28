<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Controllers\Order\OrderController;
use App\Interfaces\OrderServiceInterface;
use App\Services\Order\OrderService;

class OrderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app
            ->when(OrderController::class)
            ->needs(OrderServiceInterface::class)
            ->give(function () {
                return new OrderService();
            });
    }

    public function register(): void {}
}