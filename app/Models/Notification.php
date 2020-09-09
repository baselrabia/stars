<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    protected $with = ['users'];

    public function users()
    {
    	return $this->belongsToMany(User::class,'notification_user');
    }
  
}
