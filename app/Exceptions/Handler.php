<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Illuminate\Auth\Access\AuthorizationException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        // List exception types that should not be reported
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->view('errors.405', [], 405);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->view('errors.403', [], 403);
        }

        if ($exception instanceof TooManyRequestsHttpException) {
            return response()->view('errors.429', [], 429);
        }

        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            if ($statusCode >= 400 && $statusCode <= 504) {
                return response()->view("errors.{$statusCode}", [], $statusCode);
            }
        }


        // Handle any other exceptions
        return parent::render($request, $exception);
    }
}
