<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidManagement extends Model
{
    protected $fillable = [
        'type',
        'provider_id',
        'quotation_id',
        'payment_term',
        'delivery_term',
        'delivery_date',
        'delivery_location',
        'note',
        'status',

    ];

      /**
     * Get the products that this quotations belongs to.
     */
    public function country()
    {
        return $this->belongsTo(Country::class,'delivery_location','id');
    }

      /**
     * Get the products that this quotations belongs to.
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class,'quotation_id','id');
    }

    /**
     * Get the products that this quotations belongs to.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class,'provider_id','id');
    }

    /**
     * Get the products that this quotations belongs to.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'bidmanagement_product','bid_management_id','product_id')->withPivot('quantities','price');
    }
}
