<?php

namespace App\Http\Repos;
use App\Http\Models\State as Model;

class StateRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}