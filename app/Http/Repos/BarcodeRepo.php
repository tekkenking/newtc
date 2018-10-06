<?php

namespace App\Http\Repos;
use App\Http\Models\Barcode as Model;

class BarcodeRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}