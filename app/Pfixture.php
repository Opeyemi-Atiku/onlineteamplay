<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pfixture extends Model
{
    protected $fillable = [
        'home', 'away', 'home_score', 'away_score', 'played'
    ];
}
