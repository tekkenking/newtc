<?php

namespace App\Http\Repos;
use App\Http\Models\Lga as Model;

class LgaRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}