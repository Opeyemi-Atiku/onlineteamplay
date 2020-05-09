<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['user_id', 'forum_id', 'title', 'body'];
    
    public function User() {
    	return $this->belongsTo('App\user');
    }

    public function Comment() {
    	return $this->hasMany('App\Comment');
    }

    public function Reply() {
    	return $this->hasMany('App\Reply');
    }

    public function Forum() {
        return $this->belongsTo('App\Forum');
    }
}
