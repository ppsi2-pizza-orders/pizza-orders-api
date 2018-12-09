<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    protected $data = [];
    protected $meta = [];
    protected $messages = [];
    protected $statusCode = 200;

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function setMeta(array $meta): self
    {
        $this->meta = $meta;
        return $this;
    }

    public function setMessages(array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }

    public function pushMessage(string $message): self
    {
        $this->messages[] = __($message);
        return $this;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function response(): JsonResponse
    {
        $responseData = [
            'data' => $this->data,
            'meta' => $this->meta,
            'messages' => $this->messages,
        ];

        return new JsonResponse($responseData, $this->statusCode);
    }
}