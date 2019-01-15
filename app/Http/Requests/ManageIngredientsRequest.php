<?php

namespace App\Http\Requests;

class ManageIngredientsRequest extends AbstractApiRequest
{

    public function rules()
    {
        return [
            'available' => 'required',
            'price' => 'required',
            'ingredient_id' => 'required'
        ];
    }
}
