<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class CategoryNew extends Model implements TranslatableContract

{
    use Translatable;
   
    public $translatedAttributes = ['name'];

    protected $fillable = [
    	'name', 'status'
    ]; 

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    
}
