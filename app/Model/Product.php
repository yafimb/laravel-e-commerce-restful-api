<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Model
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name','detail','stock','price', 'discount'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
