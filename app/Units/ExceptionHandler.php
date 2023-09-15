<?php

namespace GiveBlood\Units;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Foundation\Exceptions\Handler as Handler;

class ExceptionHandler extends Handler
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
     * Report or log an exception.
     */
    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     */
    public function render($request, Throwable $exception): JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        // Validate 404 exceptions.
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(
                [
                'error' => [
                    'description' => 'Invalid URI',
                    'messages' => [ ]
                ]
                ], 404
            );
        }

        // Method not allowed exception handler
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(
                [
                'error' => [
                    'description' => 'Method Not Allowed',
                    'messages' => [ ]
                ]
                ], 405
            );
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param Request $request
     */
    protected function invalidJson($request, ValidationException $exception): JsonResponse
    {
        return response()->json($exception->errors(), $exception->status);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {

            return response()->json([ 'error' => 'Unauthenticated.' ], 401);

        }

        // return redirect()->guest('login');
    }

}
