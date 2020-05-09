<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pstat extends Model
{
    protected $fillable = ['fixture_id', 'manager_id', 'side', 'goal', 'assist', 'man_of_match', 'yellow_card', 'red_card'];

    public function Pfixture() {
    	return $this->belongsTo('App\Pfixture');
    }

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
