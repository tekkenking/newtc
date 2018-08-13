<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Customertype extends Model
{
    public $timestamps = false;

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
