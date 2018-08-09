<?php

namespace App\Http\Controllers\Tc;

use App\Http\Repos\RoleRepo;
use App\Http\Repos\StateRepo;
use App\Http\Repos\TcstaffRepo;
use App\Http\Controllers\Controller;
use App\Http\Repos\UserstatusRepo;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    public function index(Builder $builder, TcstaffRepo $tcstaffRepo)
    {
        if (request()->ajax()) {
            return DataTables::of($tcstaffRepo->model->with('user.userstatus')->select('tcstaff.*'))
                ->editColumn('user.is_confirmed', function($qr) {
                    return $qr->user->is_confirmed ? 'Yes' : 'No';
                })
                ->editColumn('user.userstatus.name', function($qr) {
                    $style = ( $qr->user->userstatus_id === 1 ) ? 'text-info' : 'text-danger';
                    return "<span class='font-bold ".$style."'>". $qr->user->userstatus->name ."</span>";
                })
                ->addColumn('role', function($qr){
                    $roles = "";
                    if($qr->user->roles->isNotEmpty()){
                        foreach($qr->user->roles as $role){
                            $roles .= "<span class='label label-plain label-sm'>".$role->name."</span> ";
                        }
                    }
                    return $roles;
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('tc.staff.edit', $qr->id)."' class='btn btn-success btn-xs'>Edit</button>";
                })
                ->rawColumns(['action', 'role', 'user.userstatus.name'])
                ->toJson();
        }

        $columns = $this->_getColumns();
        $html = $builder->columns($columns);
        return view('tc.staff.index', compact('html'));
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

    public function add(RoleRepo $roleRepo, UserstatusRepo $userstatusRepo, StateRepo $stateRepo)
    {
        $roles = $roleRepo->all();
        $userstatuses = $userstatusRepo->all();
        $states = $stateRepo->all();
        $lgas = collect([]);
        return view('tc.staff.add', compact( 'roles', 'userstatuses', 'states', 'lgas'));
    }

    public function store(TcstaffRepo $tcstaffRepo)
    {
        $request = request();
        $assignedRoles = $request->get('roles', []);

        $request->validate([
            'name'      =>  'required|max:50',
            'username'  =>  ['required', Rule::unique('users'), 'max:50'],
            'phone'     =>  ['required', Rule::unique('users')],
            'email'     =>  ['required', Rule::unique('users'), 'email'],
            'lga'       =>  ['required'],
            'address'   =>  ['required']
        ]);

        //Lets update staff info
        $user = $tcstaffRepo->createStaff($request);
        $user->syncRoles($assignedRoles);
        return response()->json(['status' => 'success', 'message' => 'Staff updated!']);
    }

    public function edit($id, TcstaffRepo $tcstaffRepo, RoleRepo $roleRepo, UserstatusRepo $userstatusRepo, StateRepo $stateRepo)
    {
        $staff = $tcstaffRepo->find($id);
        $roles = $roleRepo->all();
        $userstatuses = $userstatusRepo->all();
        $states = $stateRepo->all();

        //Load state lgas
        $state_id = $staff->lga->state->id;
        $lgas = $stateRepo->find($state_id)->lgas;

        return view('tc.staff.edit', compact('staff', 'roles', 'userstatuses', 'states', 'lgas'));
    }

    public function update($id, TcstaffRepo $tcstaffRepo)
    {
        $request = request();
        $assignedRoles = $request->get('roles', []);

        $userid = $request->usrid;
        $request->validate([
            'name'  =>  'required|max:50',
            'username'  =>  ['required', Rule::unique('users')->ignore($userid), 'max:50'],
            'phone'     =>  ['required', Rule::unique('users')->ignore($userid)],
            'email'     =>  ['required', Rule::unique('users')->ignore($userid), 'email'],
            'lga'       =>  ['required'],
            'address'   =>  ['required']
        ]);

        //Lets update staff info
        $user = $tcstaffRepo->updateStaff($id, $request)->user;
        $user->syncRoles($assignedRoles);
        return response()->json(['status' => 'success', 'message' => 'Staff updated!']);
    }
}
