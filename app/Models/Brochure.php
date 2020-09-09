<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Brochure extends Model
// implements TranslatableContract
{
    // use Translatable;

    // public static function boot() {
    //     parent::boot();

    //     ## add point to provider when create
    //     self::created(function($brochure) {
    //         $type = class_basename($brochure);

    //         event(new CreateService($brochure,$type));
    //     });
    // }
    // public $translatedAttributes = ['name'];

    protected $fillable = [
    	'name', 'attachment','day','priority','provider_id','status'
    ];

    protected $with =['provider'];

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
     * Get the provider that owns the product.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
