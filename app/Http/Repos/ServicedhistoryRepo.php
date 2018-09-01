<?php

namespace App\Http\Repos;
use App\Http\Models\Servicedhistory as Model;

class ServicedhistoryRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function getServicedhistory($flat_id)
    {
        return $this->model->where('flat_id', $flat_id)
            ->with('agency', 'servicestatus')
            ->select('servicedhistories.*');
    }
}