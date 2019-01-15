<?php

namespace App\Http\Requests;

use Log;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApiException;

class RegisterUser extends AbstractApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->getMessageBag()->all();

        Log::channel('registration')->notice('FAILED - ' . implode (', ', $messages));

        throw (new ApiException())
            ->setMessages($messages)
            ->setStatusCode(400);
    }
}