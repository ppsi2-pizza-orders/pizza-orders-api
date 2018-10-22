<?php

namespace App\Interfaces;

use App\Exceptions\ApiException;

interface ThrowableApiException
{
    public function getErrorCode(): int;
    public function setMessage(string $message): ApiException;
    public function setErrorCode(int $error_code): ApiException;
}