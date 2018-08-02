<?php

namespace App\Http\Models;

use App\Http\Models\Basemodel as Model;

class Building extends Model
{
    public function flats()
    {
        return $this->hasMany(Flat::class);
    }

    public function barcodes()
    {
        return $this->hasMany(Barcode::class);
    }

    public function barcode()
    {
        return $this->barcodes()->where('barcodestatus_id', 1)->first();
    }

    public function buildingstatus()
    {
        return $this->belongsTo(Buildingstatus::class);
    }

    public function buildingtype()
    {
        return $this->belongsTo(Buildingtype::class);
    }

    public function buildingmode()
    {
        return $this->belongsTo(Buildingmode::class);
    }

    public function buildingstructure()
    {
        return $this->belongsTo(Buildingstructure::class);
    }


}
