<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Barcodestatus extends Model
{
    public $timestamps = false;

    public function barcodes()
    {
        return $this->hasMany(Barcode::class);
    }
}
