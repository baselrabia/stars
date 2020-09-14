<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{

    protected $fillable = [
        'brand',
        'size',
        'shape',
        'product_id',
        'unit_length',
        'number_of_certificates',
        'payment_term',
        'delivery_term',
        'delivery_date',
        'delivery_location',
        'shipment_location',
        'place_of_origin',
        'in_stock',
    ];
    protected $with  = ['product','placeOfOrigin','deliveryLocation','shipmentLocation'];

    /**
     * linke product to product attribute table.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the country name that this place_of_origin belongs to in product attribute table.
     */
    public function placeOfOrigin()
    {
        return $this->belongsTo(Country::class,'place_of_origin');
    }
    /**
     * Get the country name that this delivery_location belongs to in product attribute table.
     */
    public function deliveryLocation()
    {
        return $this->belongsTo(Country::class,'delivery_location');
    }
    /**
     * Get the country name that this shipment_location belongs to in product attribute table.
     */
    public function shipmentLocation()
    {
        return $this->belongsTo(Country::class,'shipment_location');
    }
    public $timestamps = false;

}
