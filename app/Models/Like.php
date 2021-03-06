<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like_post';

    protected $fillable = [
        'like','user_id','post_id'
      ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public $timestamps = false;


}
