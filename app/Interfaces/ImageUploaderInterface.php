<?php

namespace App\Interfaces;

use Illuminate\Http\UploadedFile;

interface ImageUploaderInterface
{
    public function store(UploadedFile $file, array $options = null): string;
}