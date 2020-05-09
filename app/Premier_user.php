<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premier_user extends Model
{
    protected $fillable = [
        'premier_id', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function premier() {
        return $this->belongsTo('App\Premier');
    }
}
