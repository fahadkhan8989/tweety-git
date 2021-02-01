<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;

class Tweet extends Model
{
    use Likeable;

    protected $fillable = [
        'user_id',
        'body',
        'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : '';
    }
}
