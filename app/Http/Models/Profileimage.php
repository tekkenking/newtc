<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Profileimage extends Model
{
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
