<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id', 'team', 'goals', 'assists', 'red', 'yellow', 'clean_sheets', 'motm'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
