<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PricingPlan extends Model implements TranslatableContract
{
    use Translatable;
   
    public $translatedAttributes = ['key','value'];

    protected $fillable = ['key','value','price','day','status'];
        
    //protected $with = ['servicePlan'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function servicePlan(){
        
        return $this->belongsToMany(ServicePlan::class,'pricing_service','pricing_plan_id','service_plan_id')
        ->withPivot('count');
  
    }

    public function provider(){
        
        return $this->belongsToMany(Provider::class,'premium_accounts','pricing_plan_id','provider_id');
    }


}
