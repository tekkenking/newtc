<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Servicestatus extends Model
{
    public $timestamps = false;

    public function servicedhistories()
    {
        return $this->hasMany(Servicedhistory::class);
    }
}
