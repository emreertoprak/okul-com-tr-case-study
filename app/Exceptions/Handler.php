<?php

namespace App\Exceptions;

use App\Http\Controllers\ApiResponser;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedHttpException) {

            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());

        } else if ($exception instanceof NotFoundHttpException) {

            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        } else if ($exception instanceof ValidationException) {

            return $this->errorResponseWithErrors($exception->getMessage(), $exception->errors(), $exception->status);
        }  else if ($exception instanceof AuthenticationException) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        } else if (
            $exception instanceof AuthorizationException
            ||
            $exception instanceof \Illuminate\Validation\UnauthorizedException
        ) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
        } else if (
            $exception instanceof BadRequestHttpException
        ) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->errorResponse($exception->getMessage());
    }
}
