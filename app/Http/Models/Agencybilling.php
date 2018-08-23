<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agencybilling extends Model
{
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function agencystatus()
    {
        return $this->belongsTo(Agencystatus::class);
    }

    public function flats()
    {
        return $this->belongsToMany(Flat::class);
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
