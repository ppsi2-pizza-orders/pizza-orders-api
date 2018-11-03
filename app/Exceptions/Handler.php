<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        if ($exception instanceof NotFoundHttpException) {
            return $response
                ->setMessage('Resource not found')
                ->setCode(404)
                ->get();
        }
        if ($exception instanceof ApiException) {
            return $response
                ->setMessage($exception->getMessage())
                ->setCode($exception->getErrorCode())
                ->setErrors($exception->getErrors())
                ->get();
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return $this->returnJsonException($exception);
    }

    private function returnJsonException(Exception $exception)
    {
        $response = new ApiResponse();

        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        switch ($statusCode) {
            case 401:
                $message = 'Unauthorized';
                break;
            case 403:
                $message = 'Forbidden';
                break;
            case 404:
                $message = 'Not Found';
                break;
            case 405:
                $message = 'Method Not Allowed';
                break;
            case 422:
                $message = $exception->original['message'];
                break;
            default:
                $message = ($statusCode == 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }

        if (config('app.debug')) {
            return $response
                ->setMessage($message)
                ->setCode($statusCode)
                ->setData([
                    'trace' => $exception->getTrace(),
                    'code' => $exception->getCode()
                ])
                ->get();
        }

        return $response
            ->setMessage($message)
            ->setCode($statusCode)
            ->get();
    }
}
