<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Helpers\APIResponse;

class Handler extends ExceptionHandler
{
    protected $response;

    public function __construct(APIResponse $response) {
        $this->response = $response;
    }

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }


    public function render($request, Exception $exception)
    {
        if($exception instanceof NotFoundHttpException) {
            return response()->json(
                $this->response->setMessage('Resource not found')->get(),
                404
            );
        }

        return parent::render($request, $exception);
    }
}
