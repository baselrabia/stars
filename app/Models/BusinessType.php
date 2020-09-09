<?php

namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

// class BusinessType extends Model  implements TranslatableContract
class BusinessType extends Model

{

    // use Translatable;

    protected $fillable = ['name','status','description','image'];

    // public $translatedAttributes = ['name','description'];




    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the provider that  BusinessType belongs to.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
