<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function ticket_response() {
        return $this->hasMany('App\Ticket_response');
    }
}
