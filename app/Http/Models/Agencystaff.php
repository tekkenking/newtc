<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agencystaff extends Model
{

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function agencystafftemplogins()
    {
        return $this->hasMany(Agencystafftemplogin::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function agencystatus()
    {
        return $this->belongsTo(Agencystatus::class);
    }

    public function servicedhistories()
    {
        return $this->hasMany(Servicedhistory::class);
    }
}
