<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Customer extends Model
{
    public function customerconfig()
    {
        return $this->hasOne(Customerconfig::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function flats()
    {
        return $this->belongsToMany(Flat::class)
        ->withPivot('is_linked', 'unlinked_date');
    }

    public function flat()
    {
        //return $this->belongsToMany(Flat::class)->wherePivot('is_linked', 1);
        return $this->flats()->wherePivot('is_linked', 1);
    }

    public function customertype()
    {
        return $this->belongsTo(Customertype::class);
    }

    public function servicedhistories()
    {
        return $this->hasMany(Servicedhistory::class);
    }

    public function paymenthistories()
    {
        return $this->hasMany(Paymenthistory::class);
    }

}
