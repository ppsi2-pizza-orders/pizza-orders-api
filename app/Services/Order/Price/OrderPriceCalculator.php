<?php

namespace App\Services\Order\Price;

use App\Interfaces\PriceCalculatorInterface;
use App\Models\Order;

abstract class OrderPriceCalculator implements PriceCalculatorInterface
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}