<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Agency extends Model
{

    public function scopeActive($query)
    {
        return $query->where('agencystatus_id', 1);
    }

    public function agencyconfig()
    {
        return $this->hasOne(Agencyconfig::class);
    }

    public function agencybillingarrears()
    {
        return $this->hasMany(Agencybillingarrear::class);
    }

    public function agencytemplogins()
    {
        return $this->hasMany(Agencystafftemplogin::class);
    }

    public function governors()
    {
        return $this->belongsToMany(Governor::class)->withPivot('active');
    }

    public function currentgovernor()
    {
        return $this->governors()->where('active', 1);
    }

    public function pastgovernors()
    {
        return $this->governors()->where('active', 0);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function tcstaffs()
    {
        return $this->belongsTo(Tcstaff::class);
    }

    public function agencystaffs()
    {
        return $this->hasMany(Agencystaff::class);
    }

    public function flats()
    {
        return $this->belongsToMany(Flat::class)
        ->withPivot('accountid', 'is_linked', 'unlinked_date', 'agency_balance', 'status');
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

    public function agencybillings()
    {
        return $this->hasMany(Agencybilling::class);
    }

    public function servicedhistories()
    {
        return $this->hasMany(Servicedhistory::class);
    }
}
