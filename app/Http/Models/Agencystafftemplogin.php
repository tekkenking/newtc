<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agencystafftemplogin extends Model
{
    public function agencystaff()
    {
        return $this->belongsTo(Agencystaff::class);
    }
}
