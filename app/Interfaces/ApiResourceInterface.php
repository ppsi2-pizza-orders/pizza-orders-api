<?php

namespace App\Interfaces;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;

interface ApiResourceInterface
{
    public function response($request = null): JsonResponse;
    public function resource(Arrayable $resource): ApiResourceInterface;
    public function pushMessage(string $message): ApiResourceInterface;
    public function pushMeta($key, $meta): ApiResourceInterface;
    public function toArray(): array;
}