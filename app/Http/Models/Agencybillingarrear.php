<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agencybillingarrear extends Model
{
    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function agencybilling()
    {
        return $this->belongsTo(Agencybilling::class);
    }

    public function scopeUnpaids($query)
    {
        return $query->whereNull('paid_date');
    }

    public function scopePaids($query)
    {
        return $query->whereNotNull('paid_date');
    }
}
