<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface AdminTableInterface
{
    public function tableResponse($request = null): JsonResponse;

    public function collect($resource): AdminTableInterface;

    public function with(): array;

    public function getColumns(): array;

    public function toArray(): array;

    public function getModelClass(): string;

    public function getPagination(): int;
}