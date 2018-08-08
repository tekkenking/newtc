<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Bank extends Model
{
    public $timestamps = false;

    public function agencies()
    {
        return $this->belongsTo(Agency::class);
    }
}
