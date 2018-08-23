<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agencyconfig extends Model
{

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
