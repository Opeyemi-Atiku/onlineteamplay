<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    //user_id = sender's id
    protected $fillable = [
        'last_message', 'new', 'user_id', 'receiver_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
