<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Flatbill extends Model
{
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function agencystatus()
    {
        return $this->belongsTo(Agencystatus::class);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = unformat_money($value);
    }

    public function setPendingAmountAttribute($value)
    {
        $this->attributes['pending_amount'] = unformat_money($value);
    }
}
