<?php

namespace App\Exceptions;

use Exception;

/**
 * Class ProductNotBelongToUserException
 * @package App\Exceptions
 */
class ProductNotBelongToUserException extends Exception
{
    /**
     * @return array
     */
    public function render()
    {
        return ['errors' => 'Product Not Belong To User Exception'];
    }
}
