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

    public function agencies()
    {
        return $this->belongsToMany(Agency::class)
        ->withPivot('accountid', 'is_linked', 'unlinked_date');
    }

    public function flatbills()
    {
        return $this->belongsToMany(Flatbill::class)->withPivot('agent_id');
    }

    public function flatbill()
    {
        $agency_id = auth()->user()->profile->agency_id;
        return $this->flatbills()->where('agent_id', $agency_id);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
