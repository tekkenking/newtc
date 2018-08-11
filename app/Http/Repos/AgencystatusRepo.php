<?php

namespace App\Http\Repos;
use App\Http\Models\Agencystatus as Model;

class AgencystatusRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }
}