<?php

namespace App\Exceptions;

use App\Constants\ErrorCode;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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
        return response()->error(ErrorCode::UNAUTHENTICATED, 401);
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof AuthorizationException) {
            return response()->error(ErrorCode::UNAUTHORIZED, 403);
        } elseif ($e instanceof ModelNotFoundException) {
            return response()->error(ErrorCode::NOT_FOUND, 404);
        } elseif ($e instanceof ValidationException) {
            $error = [
                'code'    => ErrorCode::VALIDATION,
                'message' => $e->validator->errors()->first(),
            ];
            return $response = response()->json($error, 400);
        }
        return parent::render($request, $e);
    }

}
