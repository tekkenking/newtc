<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Flat extends Model
{
    public function customers()
    {
        return $this->belongsToMany(Customer::class)
        ->withPivot('is_linked', 'unlinked_date');
    }

    public function customer()
    {
        return $this->customers()->where('is_linked', 1);
    }
}
