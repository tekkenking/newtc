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
        return $this->customers()->wherePivot('is_linked', 1);
    }

    public function agencies()
    {
        return $this->belongsToMany(Agency::class)
        ->withPivot('accountid', 'is_linked', 'unlinked_date', 'agency_balance', 'status');
    }

    public function agencybillings()
    {
        return $this->belongsToMany(Agencybilling::class)->withPivot('agent_id');
    }

    public function agencybilling($agency_id = null)
    {
        $agency_id = ($agency_id) ? $agency_id : auth()->user()->profile->agency_id;
        return $this->agencybillings()->wherePivot('agent_id', $agency_id);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function servicedhistories()
    {
        return $this->hasMany(Servicedhistory::class);
    }

    public function paymenthistories()
    {
        return $this->hasMany(Paymenthistory::class);
    }

    public function agencybillingarrears()
    {
        return $this->hasMany(Agencybillingarrear::class);
    }

}
