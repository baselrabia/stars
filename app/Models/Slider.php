<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use Translatable;
   
    public $translatedAttributes = ['title','content'];

    protected $fillable = [
    	'title','content', 'image','status','start_date','end_date','url'
    ]; 

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
