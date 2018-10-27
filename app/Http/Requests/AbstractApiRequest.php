<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApiException;

abstract class AbstractApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        $errors = $validator->getMessageBag()->all();
        throw (new ApiException())
            ->setMessage('User was not registered')
            ->setErrors($errors)
            ->setErrorCode(400);
    }
}