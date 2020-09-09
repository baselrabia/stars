<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessDealTranslation extends Model
{
    /**
        * Indicates if the model should be timestamped.
        *
        * @var bool
        */
        public $timestamps = false;
    
    
        /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
        protected $fillable = [
            'name','description','locale',
        ];
}
