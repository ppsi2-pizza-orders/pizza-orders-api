<?php

namespace App\Services;

use Image;
use Storage;
use Illuminate\Http\UploadedFile;
use App\Interfaces\ImageUploaderInterface;

class ImageUploader implements ImageUploaderInterface
{
    protected $options = [
        'name' => null,
        'path' => 'public',
        'resolution' => null,
    ];

    public function store(UploadedFile $file, array $options = null): string
    {
        if ($options) {
            $this->options = $options;
        }

        $image = Image::make($file);

        if ($this->getResolution()) {
            $resolution = $this->getResolution();
            $image->fit($resolution[0], $resolution[1]);
        }

        $fullPath = $this->getPath().'/'.$this->getName();

        Storage::disk('local')->put($fullPath , $image->stream());

        return $fullPath;
    }

    protected function getResolution(): ?array
    {
        return $this->options['resolution'] ?: null;
    }

    protected function getPath(): string
    {
        return $this->options['path'] ?: 'public';
    }

    protected function getName(): string
    {
        return $this->options['name'] ?: str_random(32).'.jpg';
    }
}