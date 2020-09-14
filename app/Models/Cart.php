<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public $fillable = [
        'product_id',
        'provider_id',
        'quantity'
    ];

   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    /**
     * Get the provider that this webinars belongs to.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
