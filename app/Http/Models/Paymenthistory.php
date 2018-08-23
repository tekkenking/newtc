<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Paymenthistory extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function paymenttype()
    {
        return $this->belongsTo(Paymenttype::class);
    }
}
