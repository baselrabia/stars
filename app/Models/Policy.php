<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Policy extends Model implements TranslatableContract
{
    use Translatable;
   
    public $translatedAttributes = ['content'];

    protected $fillable = [
    	 'status','content'
    ]; 
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
