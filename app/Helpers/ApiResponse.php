<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    protected $message = '';
    protected $data = [];
    protected $code = 200;

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

    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function get(): JsonResponse
    {
        return response()->json(
            $this->getArray(),
            $this->code
        );
    }

     public function getArray(): array
     {
         return [
             'message' => $this->message,
             'data' => $this->data
         ];
     }
}