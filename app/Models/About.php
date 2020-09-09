<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model implements TranslatableContract
{
    use Translatable;
   
    public $translatedAttributes = ['title','content'];

    protected $fillable = [
    	'title', 'status','content','image'
    ]; 
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
