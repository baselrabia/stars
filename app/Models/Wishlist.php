<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';


    protected $fillable=['product_id','user_id'];

    public function scopeCount($query)
    {
        return $query->Count('product_id');
    }

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function product(){
    return $this->belongsTo(Product::class);
    }
}
