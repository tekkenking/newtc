<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Buildingtype extends Model
{
    public $timestamps = false;

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
