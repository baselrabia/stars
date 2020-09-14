<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class NewReport extends Model
// implements TranslatableContract
{
    // use Translatable;

    // public $translatedAttributes = ['title','content'];

    protected $fillable = [
    	'category_new_report_id','title','content','image','priority','status'
    ];
    protected $with = ['categoryNews'];

    //=========================================================

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



    //============================================================

     /**
     * Get the provider that owns the product.
     */
    public function categoryNews()
    {
        return $this->belongsTo(CategoryNew::class,'category_new_report_id','id');
    }
}
