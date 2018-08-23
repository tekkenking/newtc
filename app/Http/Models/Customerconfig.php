<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Customerconfig extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
