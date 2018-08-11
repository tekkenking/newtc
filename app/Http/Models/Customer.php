<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Customer extends Model
{
    public $redirect = '/customer';

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
        return $this->flats()->where('is_linked', 1);
    }

}
