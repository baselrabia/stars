<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Faq extends Model implements TranslatableContract
{
    use Translatable;
   
    public $translatedAttributes = ['question','answer'];

    protected $fillable = [
    	'answer', 'status','question'
    ]; 
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
