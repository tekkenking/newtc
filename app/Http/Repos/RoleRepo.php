<?php

namespace App\Http\Repos;
use Spatie\Permission\Models\Role as Model;

class RoleRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }
}