<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\ApiResourceController;

class UserController extends ApiResourceController
{
    public function index(Request $request)
    {
        return $this->apiResource->response($request);
    }
}


