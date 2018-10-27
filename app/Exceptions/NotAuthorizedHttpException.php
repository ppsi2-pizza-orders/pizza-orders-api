<?php

namespace App\Exceptions;

class NotAuthorizedHttpException extends ApiException
{
    protected $message = 'Not authorized';

    public function getErrorCode():int
    {
        return 401;
    }
}