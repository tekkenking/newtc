<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileimage()
    {
        return $this->hasOne(Profileimage::class);
    }
}
