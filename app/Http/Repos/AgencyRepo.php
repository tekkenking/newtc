<?php

namespace App\Http\Repos;
use App\Http\Models\Agency as Model;

class AgencyRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}