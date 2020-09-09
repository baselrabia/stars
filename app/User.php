<?php

namespace App;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Provider;
use App\Models\VerifyUser;
use App\Models\Wishlist;
use App\Notifications\MailResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Overtrue\LaravelFollow\Followable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'prefix', 'mobile', 'landline', 'lat', 'lng', 'type', 'email_verified_at', 'remember_token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = [
        'provider', 'verifyUser'
    ];
    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new MailResetPasswordNotification($token));
    }
    /**
     * Verify user mobile number
     * @return true
     */
    public function verify()
    {
        $this->verified = true;
        $this->save();
        $this->verifyUser()->delete();
    }
    public function provider()
    {
        return $this->hasOne(Provider::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function notifications()
    {
        return $this->belongsToMany(Notification::class);
    }
}
