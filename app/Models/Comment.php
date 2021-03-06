<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id','comment','post_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

   

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
