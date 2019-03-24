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
     * @var array
     */
    protected $fillable = ['star', 'customer', 'review'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
