<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    protected $fillable = ['name','point'];

    //protected $with = ['pricingPlan'];
    
    public function pricingPlan(){
        
        return $this->belongsToMany(PricingPlan::class,'pricing_service','service_plan_id','pricing_plan_id')
        ->withPivot('count');
    }
}
