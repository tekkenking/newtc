<?php

namespace App\Http\Repos;
use App\Http\Models\Paymenthistory as Model;

class PaymenthistoryRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function getPaymenthistory($flat_id)
    {
        return $this->model->where('flat_id', $flat_id)
            ->with(['paymenttype', 'status'])
            ->select('paymenthistories.*');
    }

}