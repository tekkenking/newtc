<?php

namespace App\Http\Repos;
use App\Http\Models\Gender as Model;

class GenderRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}