<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Governor extends Model
{
    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function agencies()
    {
        return $this->belongsToMany(Agency::class)->withPivot('active');
    }
}
