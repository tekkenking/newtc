<?php

namespace App\Http\Repos;
use App\Http\Models\Bank as Model;

class BankRepo extends BaseRepo
{
    public function boot()
    {
        return new Model;
    }

}