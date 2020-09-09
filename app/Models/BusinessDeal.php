<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class BusinessDeal extends Model
{
    // use Translatable;
    // public static function boot() {
    //     parent::boot();

    //     ## add point to provider when create
    //     self::created(function($businessDeal) {
    //         $type = class_basename($businessDeal);

    //         event(new CreateService($businessDeal,$type));
    //     });
    // }

    // public $translatedAttributes = ['name','description'];

    protected $fillable = [
    	'name','description','type','lat','lng','status','provider_id','priority','envelope_opening','image','publication_date','time','end','begin','video','attachment'
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
        return $this->belongsTo(Provider::class);
    }

}
