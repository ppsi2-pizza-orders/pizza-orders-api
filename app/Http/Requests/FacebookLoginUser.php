<?php

namespace App\Http\Requests;

class FacebookLoginUser extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'access_token' => 'required',
        ];
    }
}