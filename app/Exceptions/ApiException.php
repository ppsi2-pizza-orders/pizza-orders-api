<?php

namespace App\Exceptions;

use Exception;
use App\Interfaces\ThrowableApiException;

class ApiException extends Exception implements ThrowableApiException
{
    protected $message = 'Something is broken';
    protected $error_code = 500;

    public function getErrorCode(): int
    {
        return $this->error_code;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setErrorCode(int $error_code): self
    {
        $this->error_code = $error_code;
        return $this;
    }
}