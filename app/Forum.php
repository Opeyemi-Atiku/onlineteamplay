<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function Post() {
    	return $this->hasMany('App\Post');
    }
}
