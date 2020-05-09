<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar', 'role', 'email_token', 'verified', 'bio', 'email_token', 'subscribed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Post() {
        return $this->hasMany('App\Post');
    }

    public function Comment() {
        return $this->hasMany('App\Comment');
    }

    public function Reply() {
        return $this->hasMany('App\Reply');
    }

    public function shouts() {
        return $this->hasMany('App\Shout');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }

    public function seasonstat() {
        return $this->hasOne('App\Seasonstat');
    }
}
