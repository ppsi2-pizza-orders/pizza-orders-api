<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    protected $message = '';
    protected $data = [];
    protected $errors = [];
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

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;
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
         $data = [
             'message' => $this->message,
             'data' => $this->data,
             'errors' => $this->errors
         ];

         if (empty($data['data'])) {
            unset($data['data']);
         }

         if (empty($data['errors'])) {
             unset($data['errors']);
         }

         return $data;
     }
}