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
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'image' => url(Storage::url($this->resource->image)),
        ];
    }

}
