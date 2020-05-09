<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Svoid extends Model
{
    protected $fillable = ['home', 'fixture_id', 'away', 'home_score', 'away_score', 'manager_id', 'date'];

    public function Pfixture() {
    	return $this->belongsTo('App\Pfixture');
    }

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
