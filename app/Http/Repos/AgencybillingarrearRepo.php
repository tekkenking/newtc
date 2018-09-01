<?php

namespace App\Http\Repos;
use App\Http\Models\Agencybillingarrear as Model;

class AgencybillingarrearRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function getBillinghistory($flatid)
    {
        return $this->model->where('flat_id', $flatid)
            ->with(['agency', 'agencybilling', 'paymenthistory.status'])
            ->select('agencybillingarrears.*');
    }

}