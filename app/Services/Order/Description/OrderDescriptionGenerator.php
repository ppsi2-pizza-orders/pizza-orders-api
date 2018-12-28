<?php

namespace App\Services\Order\Description;

use App\Interfaces\DescriptionGeneratorInterface;
use App\Models\Order;

abstract class OrderDescriptionGenerator implements DescriptionGeneratorInterface
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}