<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    
    protected $fillable = [
    	'title', 'image','status','start_date','end_date','url','location'
    ]; 

    public function latest($column = 'created_at')
    {
    return $this->orderBy($column,'desc');
    }

    public function scopeLocation($query,$location,$column='created_at')
    {
    return $query->where('location',$location)->orderBy($column,'desc');
    }
}
