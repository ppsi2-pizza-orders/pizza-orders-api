<?php

namespace App\Services;

use Image;
use Storage;
use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    protected $options = [
        'name' => null,
        'path' => 'public',
        'size' => null,
    ];

    public function store(UploadedFile $file, array $options = null): string
    {
        if ($options) {
            $this->options = $options;
        }

        $image = Image::make($file);

        if ($this->getSize()) {
            $size = $this->getSize();
            $image->fit($size[0], $size[1]);
        }

        $fullPath = $this->getPath().'\\'.$this->getName();

        Storage::disk('local')->put($fullPath , $image->stream()->__toString());

        return $fullPath;
    }

    protected function getSize(): ?array
    {
        return $this->options['size'] ?: null;
    }

    protected function getPath(): string
    {
        return $this->options['path'] ?: 'public';
    }

    protected function getName(): string
    {
        return $this->options['name'] ?: str_random(32).'jpg';
    }
}