<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agency extends Model
{
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function tcstaff()
    {
        return $this->belongsTo(Tcstaff::class);
    }

    public function agencystaff()
    {
        return $this->hasMany(Agencystaff::class);
    }

    public function flats()
    {
        return $this->belongsToMany(Flat::class)
        ->withPivot('accountid', 'is_linked', 'unlinked_date');
    }

    public function agencycategory()
    {
        return $this->belongsTo(Agencycategory::class);
    }

    public function agencymode()
    {
        return $this->belongsTo(Agencymode::class);
    }

    public function agencystatus()
    {
        return $this->belongsTo(Agencystatus::class);
    }
}
