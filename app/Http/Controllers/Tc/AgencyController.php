<?php

namespace App\Http\Controllers\Tc;

use App\Http\Controllers\Controller;

class AgencyController extends Controller
{
    public function index()
    {

    }

    private function _getColumns()
    {
        return [
            ['data' => 'name',   'name' => 'name',  'title' => 'Name'],
            ['data' => 'user.username',   'name' => 'user.username',  'title' => 'UserName'],
            ['data' => 'user.userstatus.name',   'name' => 'user.userstatus.name',  'title' => 'UserStatus'],
            ['data' => 'user.is_confirmed',   'name' => 'user.is_confirmed',  'title' => 'Confirmed?'],
            ['data' => 'role',   'name' => 'role',  'title' => 'Roles'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => ''
            ]
        ];
    }
}
