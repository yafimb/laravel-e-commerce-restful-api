<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Class Handler
 * @package App\Exceptions
 */
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
     * @param Exception $exception
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response|mixed
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($request->acceptsJson())
        {
            if($exception instanceof ModelNotFoundException)
            {
                return response()->json([
                    'errors' => ['Model not found']
                ], Response::HTTP_NOT_FOUND);
            }

            if($exception instanceof NotFoundHttpException)
            {
                return response()->json([
                    'errors' => ['Incorect route']
                ], Response::HTTP_NOT_FOUND);
            }
        }

        return parent::render($request, $exception);
    }
}
