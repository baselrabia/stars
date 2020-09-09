<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
    	'title', 'image','status','priority'
    ]; 
    
    protected $hidden = ['created_at','updated_at'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopePriority($query)
    {
        return $query->where('priority', 'on');
    }

    public function scopePrioritySorted($query)
    {
        return $query->orderBy('priority');
    }
}
