<?php

namespace App\Http\Controllers\Tc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('tc.dashboard.index');
    }
}
