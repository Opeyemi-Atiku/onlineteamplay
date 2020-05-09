<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message', 'receiver_id', 'sender_id', 'new'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
