<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Broadcasting\BroadcastException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

use App\Helpers\ApiResponse;

class Handler extends ExceptionHandler
{

    public function report(Exception $exception)
    {
       parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        $response = new ApiResponse();

        if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
            return $response
                ->pushMessage('Resource not found')
                ->setStatusCode(404)
                ->response();
        }

        if($exception instanceof MethodNotAllowedHttpException) {
            return $response
                ->pushMessage('Method not allowed')
                ->setStatusCode(404)
                ->response();
        }

        if($exception instanceof BroadcastException) {
            return $response
                ->pushMessage('Could not broadcast event')
                ->setStatusCode(500);
        }

        if ($exception instanceof TokenBlacklistedException) {
            return $response
                ->pushMessage('Token blacklisted')
                ->setStatusCode(401)
                ->response();
        }

        if ($exception instanceof ApiException) {
            return $response
                ->setMessages($exception->getMessages())
                ->setStatusCode($exception->getStatusCode())
                ->response();
        }

        return parent::render($request, $exception);
    }
}
