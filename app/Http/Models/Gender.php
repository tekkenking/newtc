<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Gender extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
