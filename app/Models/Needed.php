<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Needed extends Model
// implements TranslatableContract
{
    // use Translatable;

    // public $translatedAttributes = ['summary','requirements'];

    protected $fillable = [
    	'priority','person_name','type','image', 'status','summary','requirements','provider_id','phone','email','landline','location','link'
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
     * Get the provider that owns the product.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
