<?php

namespace App\Services;

class IngredientImageUploader extends ImageUploader
{
    protected function getResolution(): ?array
    {
        return ['200', '200'];
    }

    protected function getPath(): string
    {
        return 'storage/ingredients';
    }
}