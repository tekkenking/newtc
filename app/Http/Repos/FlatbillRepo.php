<?php

namespace App\Http\Repos;
use App\Http\Models\Flatbill as Model;

class FlatbillRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function updateBill($id, $request)
    {
        $bill = $this->find($id);
        if($bill->amount != $request->amount) {
            $bill->pending_amount = $request->amount;
        }
        $bill->name = $request->name;
        $bill->description = $request->description;
        $bill->agencystatus_id = $request->agencystatus_id;
        $bill->save();
        return $bill;
    }

}