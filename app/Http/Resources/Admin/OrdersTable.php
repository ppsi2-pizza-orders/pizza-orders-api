<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Order\OrderPizzaResource;
use App\Models\Order;

class OrdersTable extends AbstractAdminTable
{
    public function getModelClass(): string
    {
        return Order::class;
    }

    public function getPagination(): int
    {
        return 25;
    }

    public function getColumns(): array
    {
        return [
            [ 'name' => 'id', 'label' => __('id'), 'sortable' => true, 'searchable' => false ],
            [ 'name' => 'token', 'label' => __('token'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'email', 'label' => __('email'), 'sortable' => false, 'searchable' => false ],
            [ 'name' => 'restaurant', 'label' => __('restaurant'), 'sortable' => false, 'searchable' => false ],
            [ 'name' => 'city', 'label' => __('city'), 'sortable' => false, 'searchable' => false ],
            [ 'name' => 'status', 'label' => __('status'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'delivery_address', 'label' => __('delivery address'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'phone_number', 'label' => __('phone number'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'created_at', 'label' => __('created at'), 'sortable' => true, 'searchable' => false ],
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'token' => $this->resource->token,
            'email' => $this->resource->user->email,
            'restaurant' => $this->resource->restaurant->name,
            'city' => $this->resource->restaurant->city,
            'status' => $this->resource->status,
            'delivery_address' => $this->resource->delivery_address,
            'phone_number' => $this->resource->phone_number,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
            'pizzas' => (new OrderPizzaResource)->collect($this->resource->pizzas)
        ];
    }

}
