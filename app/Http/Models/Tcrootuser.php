<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Tcrootuser extends Model
{
    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }
}
