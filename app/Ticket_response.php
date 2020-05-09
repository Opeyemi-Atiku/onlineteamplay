<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_response extends Model
{
    protected $fillable = ['ticket_id', 'receiver_id', 'user_id', 'message', 'attachment'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function ticket() {
    	return $this->belongsTo('App\Ticket');
    }
}
