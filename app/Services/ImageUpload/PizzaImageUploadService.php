<?php

namespace App\Services;

class PizzaImageUploadService extends ImageUploadService
{
    protected function getSize(): ?array
    {
        return ['200', '200'];
    }

    protected function getPath(): string
    {
        return 'public/pizzas';
    }
}