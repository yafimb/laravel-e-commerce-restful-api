<?php
namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Trait ExceptionTrait
 * @package App\Traits
 */
trait ExceptionTrait
{
    /**
     * @param $reauest
     * @param $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiException($reauest, $e)
    {
        if($e instanceof ModelNotFoundException)
        {
            return response()->json([
                'errors' => ['Model not found']
            ], Response::HTTP_NOT_FOUND);
        }

        if($e instanceof NotFoundHttpException)
        {
            return response()->json([
                'errors' => ['Incorrect route']
            ], Response::HTTP_NOT_FOUND);
        }
    }
}