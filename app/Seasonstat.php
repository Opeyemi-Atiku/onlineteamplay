<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seasonstat extends Model
{
    protected $fillable = [
        'user_id', 'team', 'goals', 'assists', 'red', 'yellow', 'clean_sheets', 'motm'
    ];
}
