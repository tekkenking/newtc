<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Servicestatus extends Model
{
    public $timestamps = false;

    public function servicedhistories()
    {
        return $this->hasMany(Servicedhistory::class);
    }

    public function color()
    {
        $color = 'success';
        if($this->name == 'grace') {
            $color = 'warning';
        }

        if($this->name == 'fail') {
            $color = 'danger';
        }

        if($this->name == 'paused') {
            $color = 'muted';
        }

        return $color;
    }
}
