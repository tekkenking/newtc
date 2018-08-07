<?php

namespace App\Http\Repos;
use App\Http\Models\Userstatus as Model;

class UserstatusRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }
}