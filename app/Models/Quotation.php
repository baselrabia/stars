<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    public static function boot() {
        parent::boot();

        ## add point to provider when create
        self::created(function($quotation) {
            $type = class_basename($quotation);

            // event(new CreateService($quotation,$type));
        });

    }
    protected $fillable = [
        'type',
        'payment_term',
        'delivery_term',
        'delivery_date',
        'delivery_location',
        'note',
        'attachment',
        'species',
        'provider_id'
    ];

    protected $with = ['providers','products','bidManagement','externalProductQuotation'];

    /**
     * Get the products that this quotations belongs to.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_quotation')->withPivot('quantities');
    }

    /**
     * Get the provider that this webinars belongs to.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    /**
     * Get the products that this quotations belongs to.
     */
    public function providers()
    {
        return $this->belongsToMany(Provider::class,'provider_quotation')->withPivot('status');
    }

    /**
     * Get the products that this quotations belongs to.
     */
    public function country()
    {
        return $this->belongsTo(Country::class,'delivery_location','id');
    }

     /**
     * Get the branche that this provider belongs to.
     */
    public function bidManagement()
    {
        return $this->hasMany(BidManagement::class,'quotation_id','id');
    }
  /**
     *
     */
    public function externalProductQuotation()
    {
        return $this->hasMany(ExternalProductQuotation::class,'quotation_id','id');
    }

}
