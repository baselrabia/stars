<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    /**
     * Get the provider that this product belongs to.
     */
    public function providers()
    {
        return $this->belongsToMany(Provider::class,'country_provider')->withPivot('provider_id','country_id');
    }
    
    /**
     * Get the provider that this product belongs to.
     */
    public function productAttribute()
    {
        return $this->hasOne(ProductAttribute::class,['place_of_origin','shipment_location','delivery_location']);
    } 
     /**
     * Get the provider that this product belongs to.
     */
    public function webinar()
    {
        return $this->hasMany(Webinar::class,'country','id');
    } 
    
    /**
     * Get the provider that this product belongs to.
     */
    public function quotation()
    {
        return $this->hasMany(Quotation::class,'delivery_location','id');
    }
}
