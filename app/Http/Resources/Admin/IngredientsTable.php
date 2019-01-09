<?php

namespace App\Http\Resources\Admin;

use Storage;
use App\Models\Ingredient;

class IngredientsTable extends AbstractAdminTable
{
    public function getModelClass(): string
    {
        return Ingredient::class;
    }

    public function getPagination(): int
    {
        return 25;
    }

    public function getColumns(): array
    {
        return [
            [ 'name' => 'id', 'label' => __('id'), 'sortable' => true ],
            [ 'name' => 'name', 'label' => __('name'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'image', 'label' => __('image') ],
            [ 'name' => 'thumbnail', 'label' => __('thumbnail') ],
            [ 'name' => 'index', 'label' => __('index') ],
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => url(Storage::url($this->resource->image)),
            'thumbnail' => url(Storage::url($this->resource->thumbnail)),
            'index' => $this->resource->index,
        ];
    }

}
