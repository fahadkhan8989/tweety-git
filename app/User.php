<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Tweet;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'avatar', 'banner', 'bio', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        if ($value) {

            return asset('storage/' . $value);
        } else {

            return asset('images/default-avatar.png');
        }
    }

    public function getBannerAttribute($value)
    {
        if ($value) {

            return asset('storage/' . $value);
        } else {

            return asset('images/profile-banner.jpg');
        }
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (Hash::needsRehash($value)) ? bcrypt($value) : $value;
    }

    public function profile_timeline()
    {
        return Tweet::where('user_id', $this->id)->withLikes()->latest()->paginate(5);
    }
    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()->paginate(20);
    }
    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
