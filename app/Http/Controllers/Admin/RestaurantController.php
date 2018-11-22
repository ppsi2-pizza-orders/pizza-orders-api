<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RestaurantsTable;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $resource;

    public function __construct(RestaurantsTable $resource)
    {
        $this->resource = $resource;
    }

    public function index(Request $request)
    {
        return $this->resource->tableResponse($request);
    }
}


