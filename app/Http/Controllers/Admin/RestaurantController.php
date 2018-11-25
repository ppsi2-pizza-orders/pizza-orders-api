<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RestaurantsTable;

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


