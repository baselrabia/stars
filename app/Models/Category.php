<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    // use Translatable;

    // public $translatedAttributes = ['name','description'];

    protected $fillable = [
    	'name', 'status','description','parent_id'
    ];

    protected $with = [
        'childs',
        'providers',
        'medias'
    ];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }


    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id','id');
    }


    public function primaryFather()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->with('childs');
    }


     /**
     * Get the provider that this categories belongs to.
     */
    public function providers()
    {
        return $this->belongsToMany(Provider::class,'category_provider')->withPivot('provider_id','category_id');

    }
    /**
     * Get the webinars that this categories belongs to.
     */
    public function webinars()
    {
        return $this->belongsToMany(Webinar::class,'category_webinar')->withPivot('category_id','webinar_id');

    }

    /**
     * Get all media of product.
     */
    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

}
