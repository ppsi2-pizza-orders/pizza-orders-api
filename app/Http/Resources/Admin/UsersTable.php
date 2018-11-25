<?php

namespace App\Http\Resources\Admin;

use App\Models\User;

class UsersTable extends AbstractAdminTable
{
    public function getModelClass(): string
    {
        return User::class;
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
            [ 'name' => 'email', 'label' => __('email'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'provider', 'label' => __('provider'), 'sortable' => true, 'searchable' => true ],
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'provider' => $this->resource->provider,
        ];
    }

}
