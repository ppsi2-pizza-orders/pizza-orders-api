<?php

namespace App\Exceptions;

use Exception;
use App\Interfaces\ThrowableApiException;

class ApiException extends Exception implements ThrowableApiException
{
    protected $message = 'Something is broken';
    protected $errorCode = 500;
    protected $errors = [];

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setErrorCode(int $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}