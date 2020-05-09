<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Super extends Model
{
    protected $fillable = [
        'team_name', 'GP', 'W', 'D', 'L', 'GF', 'GA', 'GD', 'PTS', 'logo', 'manager_id'
    ];

    public function super_users() {
        return $this->hasMany('App\SuperUser');
    }
}
