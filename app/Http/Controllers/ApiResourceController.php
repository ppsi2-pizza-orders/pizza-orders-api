<?php

namespace App\Http\Controllers;

use App\Interfaces\ApiResourceInterface as ApiResource;

class ApiResourceController extends Controller
{
    protected $apiResource;

    public function __construct(ApiResource $apiResource)
    {
        $this->apiResource = $apiResource;
        parent::__construct();
    }
}