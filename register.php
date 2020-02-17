<?php

namespace App;

class register extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment','user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }
}
