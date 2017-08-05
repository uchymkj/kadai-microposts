<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    
    public function Postfollowings()
    {
        return $this->belongsToMany(Micropost::class, 'micropost_follow', 'user_id', 'micropost_id')->withTimestamps();
    }
    
    
    public function Postfollowers()
    {
        return $this->belongsToMany(User::class, 'micropost_follow', 'micropost_id', 'user_id')->withTimestamps();
    }
    
}
