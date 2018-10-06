<?php

namespace App\Http\Repos;
use App\Http\Models\Agencycategory as Model;

class AgencycategoryRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}