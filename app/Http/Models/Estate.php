<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Estate extends Model
{
    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
