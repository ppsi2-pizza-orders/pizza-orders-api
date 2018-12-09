<?php

namespace App\Exceptions;

use Exception;
use App\Interfaces\ApiExceptionInterface;

class ApiException extends Exception implements ApiExceptionInterface
{
    protected $messages = [];
    protected $statusCode = 500;

    public function pushMessage(string $message): ApiExceptionInterface
    {
        $this->messages[] = __($message);
        return $this;
    }

    public function setMessages(array $messages): ApiExceptionInterface
    {
        $this->messages = $messages;
        return $this;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setStatusCode(int $statusCode): ApiExceptionInterface
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}