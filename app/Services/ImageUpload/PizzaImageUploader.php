<?php

namespace App\Services;

class PizzaImageUploader extends ImageUploader
{
    protected function getResolution(): ?array
    {
        return ['200', '200'];
    }

    protected function getPath(): string
    {
        return 'storage/pizzas';
    }
}