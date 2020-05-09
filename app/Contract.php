<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id', 'manager_id', 'team', 'league', 'week'
    ];

    public function manager() {
        return $this->belongsTo('App\User');
    }
}
