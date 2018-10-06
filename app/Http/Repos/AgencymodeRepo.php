<?php

namespace App\Http\Repos;
use App\Http\Models\Agencymode as Model;

class AgencymodeRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}