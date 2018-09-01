<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;

    public function paymenthistories()
    {
        return $this->hasMany(Paymenthistory::class);
    }


    public function color()
    {
        return ($this->name == 'success') ? 'text-success' : 'text-danger';
    }
}
