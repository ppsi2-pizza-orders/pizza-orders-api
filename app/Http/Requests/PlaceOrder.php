<?php

namespace App\Http\Requests;

class PlaceOrder extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'restaurant_id' => 'required',
            'pizzas' => 'required|array',
            'delivery_address' => 'required',
            'phone_number' => 'required',
        ];
    }
}
