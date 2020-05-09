<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pstat_temp extends Model
{
    protected $fillable = ['fixture_id', 'manager_id', 'side', 'goal', 'assist', 'man_of_match', 'yellow_card', 'red_card'];
}
