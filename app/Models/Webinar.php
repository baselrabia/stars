<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Webinar extends Model
// implements TranslatableContract
{
    //  use Translatable;

    public static function boot() {
        parent::boot();

        ## add point to provider when create
        self::created(function($webinar) {
            $type = class_basename($webinar);

            // event(new CreateService($webinar,$type));
        });
    }

    // public $translatedAttributes = ['name','description','summary'];

    protected $fillable = [
        'name','description','summary','host','type','provider_id','link','date',
        'time','country','logo'
    ];

    // protected $with =['categories','provider','countryName','providers'];

    /**
     * Get the categories that this webinars belongs to.
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_webinar')->withPivot('category_id','webinar_id');
    }
    /**
     * Get the categories that this webinars belongs to.
    */
    public function providers()
    {
        return $this->belongsToMany(Provider::class,'provider_webinar')->withPivot('provider_id','webinar_id');
    }

    /**
     * Get the provider that this webinars belongs to.
    */
    public function provider()
    {
        return $this->belongsTo(Provider::class,'provider_id');
    }
       /**
     * Get the country that this webinars belongs to.
    */
    public function countryName()
    {
        return $this->belongsTo(Country::class,'country','id');
    }
}
