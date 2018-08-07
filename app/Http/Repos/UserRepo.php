<?php

namespace App\Http\Repos;
use App\Http\Models\User as Model;

class UserRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}