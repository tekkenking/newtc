<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as  Model;

class Paymenttype extends Model
{

    public $timestamps = false;

    public function paymenthistories()
    {
        return $this->hasMany(Paymenthistory::class);
    }
}
