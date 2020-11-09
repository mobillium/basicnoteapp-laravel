<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->error(__('error.message.unauthorized'), __('error.code.unauthorized'), 403);
    }

    public function render($request, Throwable $e)
    {
        dd($request);
        if ($e instanceof AuthorizationException) {
            return response()->error(__('error.message.unauthorized'), __('error.code.unauthorized'), 403);
        }
        return parent::render($request, $e);
    }

}
