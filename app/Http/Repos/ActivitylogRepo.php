<?php

namespace App\Http\Repos;
use App\Http\Models\Activitylog as Model;

class ActivitylogRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}