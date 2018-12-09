<?php

namespace App\Interfaces;

interface ApiExceptionInterface
{
    public function getStatusCode(): int;
    public function getMessages(): array;
    public function setMessages(array $messages): ApiExceptionInterface;
    public function pushMessage(string $message): ApiExceptionInterface;
    public function setStatusCode(int $statusCode): ApiExceptionInterface;
}