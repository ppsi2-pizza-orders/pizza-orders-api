<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApiException;

abstract class AbstractApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->getMessageBag()->all();
        throw (new ApiException())
            ->setMessages($messages)
            ->setStatusCode(400);
    }
}