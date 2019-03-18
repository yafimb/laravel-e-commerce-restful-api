<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * @package App\Model
 */
class Review extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
