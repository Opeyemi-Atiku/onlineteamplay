<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Super_user extends Model
{
    protected $fillable = [
        'super_id', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function super() {
        return $this->belongsTo('App\Super');
    }
}
