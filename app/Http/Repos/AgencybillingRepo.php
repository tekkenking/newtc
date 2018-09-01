<?php

namespace App\Http\Repos;
use App\Http\Models\Agencybilling as Model;

class AgencybillingRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

    public function getBillings($agency)
    {
        return $agency
            ->agencybillings()
            ->with('agencystatus')
            ->select('agencybillings.*');
    }

}