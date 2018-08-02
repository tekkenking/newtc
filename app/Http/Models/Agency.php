<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agency extends Model
{
    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function tcstaff()
    {
        return $this->belongsTo(Tcstaff::class);
    }

    public function agencystaff()
    {
        return $this->hasMany(Agencystaff::class);
    }
}
