<?php

namespace App\Http\Requests;

class RegisterUser extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }
}