<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comments','post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
