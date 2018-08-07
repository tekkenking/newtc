<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Tcstaff extends Model
{

    protected $table = 'tcstaff';

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }
}