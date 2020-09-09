<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    protected $fillable = [
    	'landline', 'person_name','lng','lat','phone','email','provider_id'
    ]; 
    
    /**
     * Get the provider that this product belongs to.
     */
    public function provider()
    {
        return $this->hasMany(Provider::class);
    }
}
