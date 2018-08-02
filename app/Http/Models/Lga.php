<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Lga extends Model
{
    public $timestamps = false;

    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }
}
