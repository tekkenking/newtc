<?php

namespace App\Http\Controllers;

use App\Http\Repos\StateRepo;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStateLgas(StateRepo $stateRepo)
    {
        $stateid = request()->id;

        $lgas = ($stateid) ? $stateRepo->find(request()->id)->lgas : collect([]);
        $default_id = 0;
        return view('partials.lgas', compact('lgas', 'default_id'))->render();
    }
}
