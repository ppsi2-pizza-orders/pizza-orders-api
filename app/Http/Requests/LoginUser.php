<?php

namespace App\Http\Requests;

class LoginUser extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
}