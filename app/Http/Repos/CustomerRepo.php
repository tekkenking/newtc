<?php

namespace App\Http\Repos;
use App\Http\Models\Customer as Model;

class CustomerRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function details($id, $agencyID)
    {
        $detail = $this->model->where('id', $id)
            ->with(['user', 'flat' => function($flt) use ($agencyID) {
                $flt->with(['agencies' => function($ag) use ($agencyID) {
                    $ag->where('id', $agencyID);
                }, 'building.lga.state', 'building.barcode', 'flatbill']);
            }])->first();

        //dd($detail->toArray());
        return $detail;
    }
}