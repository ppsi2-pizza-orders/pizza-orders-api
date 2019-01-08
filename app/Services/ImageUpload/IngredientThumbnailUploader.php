<?php

namespace App\Services;

class IngredientThumbnailUploader extends ImageUploader
{
    protected function getResolution(): ?array
    {
        return ['200', '200'];
    }

    protected function getPath(): string
    {
        return 'public/ingredients/thumbnails';
    }
}