<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'user_id', 'team_id', 'league'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
