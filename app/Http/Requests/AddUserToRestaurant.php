<?php

namespace App\Http\Requests;

class AddUserToRestaurant extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'role' => 'required|integer|between:1,3',
        ];
    }
}
