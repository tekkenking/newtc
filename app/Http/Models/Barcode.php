<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Barcode extends Model
{
    public function barcodestatus()
    {
        return $this->belongsTo(Barcodestatus::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
