<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class State extends Model
{
    public $timestamps = false;

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
