<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumAccount extends Model
{
    protected $fillable = ['provider_id','pricing_plan_id','start','end'];
    
 
    public function providers(){

        return $this->belongsToMany(PremiumAccount::class,'premium_accounts','pricing_plan_id','provider_id');
    }
    
    public function pricingPlan(){

        return $this->belongsToMany(PricingPlan::class,'premium_accounts','pricing_plan_id','provider_id');
    }
}
