<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Contracts\Support\Arrayable;

use App\Helpers\ApiResponse;
use App\Interfaces\ApiResourceInterface;

class ApiResource implements ApiResourceInterface
{
    protected $resource;
    protected $data = [];
    protected $meta = [];
    protected $messages = [];

    public function __construct()
    {
        $this->resource = new JsonResource(null);
    }

    public function toArray(): array
    {
        return [];
    }

    public function response($request = null): JsonResponse
    {
        $response = new ApiResponse();

        return $response
            ->setData($this->getData())
            ->setMeta($this->meta)
            ->setMessages($this->messages)
            ->response();
    }

    public function resource(Arrayable $resource): ApiResourceInterface
    {
        $this->resource->resource = $resource;
        return $this;
    }

    public function pushMessage(string $message): ApiResourceInterface
    {
        $this->messages[] = __($message);
        return $this;
    }

    public function pushMeta($key, $meta): ApiResourceInterface
    {
        $this->meta[$key] = $meta;
        return $this;
    }

    public function collect(Arrayable $resource): array
    {
        return $this->resource($resource)->getData();
    }

    protected function getData(): array
    {
        $data = [];

        if ($this->resource->resource instanceof Collection || $this->resource->resource instanceof SupportCollection) {
            foreach($this->resource->resource as $resource) {
                $this->resource->resource = $resource;
                $data[] = $this->toArray();
            }
        } else {
            $data = $this->toArray();
        }

        return $data;
    }
}