<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $fillable = [
        'label', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
