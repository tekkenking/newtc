<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgencyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $agencies = $user->profile->flat[0]->agencies;
        $flat = $user->profile->flat[0];

        return view('customer.agency.index', compact('agencies', 'flat'));
    }
}
