<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Helpers\ApiResponse;
use App\Exceptions\ApiException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $apiResponse, $apiException;

    public function __construct()
    {
        $this->apiResponse = new ApiResponse();
        $this->apiException = new ApiException();
    }
}
