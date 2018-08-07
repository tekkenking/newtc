<?php

namespace App\Http\Repos;
use Spatie\Permission\Models\Permission as Model;

class PermissionRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }
}