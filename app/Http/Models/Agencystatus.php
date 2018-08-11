<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agencystatus extends Model
{
    public $timestamps = false;

    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }

    public function agencstaffs()
    {
        return $this->hasMany(Agencystaff::class);
    }

}
