<?php

namespace App\Http\Repos;
use App\Http\Models\Tcstaff as Model;

class TcstaffRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }
}