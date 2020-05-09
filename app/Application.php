<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'team', 'league'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
