<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Helpers\APIResponse;

class Handler extends ExceptionHandler
{

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        $response = new ApiResponse();

        if($exception instanceof NotFoundHttpException) {
            return $response
                ->setMessage('Resource not found')
                ->setCode(404)
                ->get();
        }
        if($exception instanceof ApiException) {
            return $response
                ->setMessage($exception->getMessage())
                ->setCode($exception->getErrorCode())
                ->get();
        }

        if(config('app.debug')) {
            return parent::render($request, $exception);
        } else {
            return $response
                ->setMessage($exception->getMessage())
                ->setCode(500)
                ->get();
        }
    }
}
