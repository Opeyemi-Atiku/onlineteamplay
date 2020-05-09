<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shout extends Model
{
    protected $fillable = [
        'shout', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
