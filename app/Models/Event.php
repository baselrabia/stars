<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Event extends Model
{
    //use Translatable;


    public static function boot() {
        parent::boot();
        ## add point to provider when create
        // self::created(function($event) {
        //     $type = class_basename($event);

        //     event(new CreateService($event,$type));
        // });

    }
    //public $translatedAttributes = ['name','description'];

    protected $fillable = [
        'name','description','provider_id','type','start_date',
        'end_date','time','lat','lng','video','link','priority','status',
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

    public function provider(){

        return $this->belongsTo(Provider::class);
    }
    /**
     * Get all media of product.
     */
    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
