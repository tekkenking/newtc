<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Lga extends Model
{
    public $timestamps = false;

    public function tcstaffs()
    {
        return $this->hasMany(Tcstaff::class);
    }

    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
