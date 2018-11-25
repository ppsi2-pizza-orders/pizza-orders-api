<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\IngredientsTable;

class IngredientController extends Controller
{
    protected $resource;

    public function __construct(IngredientsTable $resource)
    {
        $this->resource = $resource;
    }

    public function index(Request $request)
    {
        return $this->resource->tableResponse($request);
    }
}


