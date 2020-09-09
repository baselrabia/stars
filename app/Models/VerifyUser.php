<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'verification_code', 'verification_expiry_days', 'verification_updated_at', 'type',
    ];


    /**
     * Get the user that owns the verification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
