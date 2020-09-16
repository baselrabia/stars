<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    // use Translatable;

    public static function boot() {
        parent::boot();

        ## add point to provider when create
        self::created(function($product) {
            $type = class_basename($product);

            // event(new CreateService($product,$type));
        });

    }

    // public $translatedAttributes = ['name','description'];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price_per_item',
        'price_lot_from',
        'price_lot_to',
        'minimum_order',
        'unit',
        'attachment',
        'video',
        'type',
        'available',
        'provider_id',
        'priority',
        'location',
        'status',
    ];

    protected $with = [
        // 'translations',
        'provider','medias','category'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopePriority($query)
    {
        return $query->where('priority', 'on');
    }

    public function scopePrioritySorted($query)
    {
        return $query->orderBy('priority');
    }
    public function scopeOffers($query)
    {
        return $query->where('location', 'home');
    }

    /**
     * Get the category that this product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the Attribute that this product belongs to.
     */
    public function productAttribute()
    {
        return $this->hasOne(ProductAttribute::class);
    }

    /**
     * Get all media of product.
     */
    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Get the provider that owns the product.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class,'provider_id');
    }

     /**
     * Get the wishlist that owns to  product.
     */
    public function wishlist(){

        return $this->hasMany(Wishlist::class);
     }

    /**
     * Get the quotations that this products belongs to.
     */
    public function quotations()
    {
        return $this->belongsToMany(Quotation::class,'product_quotation')->withPivot('quantities');
    }
     /**
     * Get the quotations that this products belongs to.
     */
    public function bidsManagement()
    {
        return $this->belongsToMany(BidManagement::class,'bidManagement_product','bid_management_id','product_id')->withPivot('quantities','price');
    }
}
