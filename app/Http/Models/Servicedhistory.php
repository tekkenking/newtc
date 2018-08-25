<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Servicedhistory extends Model
{
    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function agencystaff()
    {
        return $this->belongsTo(Agencystaff::class);
    }

    public function servicestatus()
    {
        return $this->belongsTo(Servicestatus::class);
    }

    public function servicechargestatus()
    {
        return $this->belongsTo(Servicechargestatus::class);
    }
}
