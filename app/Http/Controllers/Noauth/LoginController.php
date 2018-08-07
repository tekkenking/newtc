<?php

namespace App\Http\Controllers\Noauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('noauth.login');
    }
}
