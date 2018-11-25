<?php

namespace App\Http\Resources\Admin;

use App\Models\Restaurant;
use App\Models\User;

class RestaurantsTable extends AbstractAdminTable
{
    public function getModelClass(): string
    {
        return Restaurant::class;
    }

    public function getPagination(): int
    {
        return 25;
    }

    public function getColumns(): array
    {
        return [
            [ 'name' => 'id', 'label' => __('id'), 'sortable' => true, 'searchable' => false ],
            [ 'name' => 'name', 'label' => __('name'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'city', 'label' => __('city'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'address', 'label' => __('address'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'phone', 'label' => __('phone'), 'searchable' => true ],
            [ 'name' => 'description', 'label' => __('description'), 'searchable' => true ],
            [ 'name' => 'created_at', 'label' => __('created_at'), 'sortable' => true ],
            [ 'name' => 'owner', 'label' => __('owner') ],
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'address' => $this->resource->address,
            'phone' => $this->resource->phone,
            'photo' => $this->resource->photo,
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
            'owner' => User::find($this->resource->owner_id, ['id', 'name']),
        ];
    }

}
