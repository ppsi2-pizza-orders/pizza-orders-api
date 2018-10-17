<?php

namespace App\Helpers;

class ApiResponse
{
    protected $message = '';
    protected $data = [];

    public function get(): array
    {
        return [
            'message' => $this->message,
            'data' => $this->data
        ];
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

}