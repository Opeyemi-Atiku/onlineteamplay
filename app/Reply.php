<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $fillable = ['user_id', 'post_id', 'comment_id', 'body'];

    public function comment() {
    	return $this->belongsTo('App\Comment');
    }

    public function Post() {
    	return $this->belongsTo('App\Post');
    }

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
