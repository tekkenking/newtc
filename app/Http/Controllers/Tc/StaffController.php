<?php

namespace App\Http\Controllers\Tc;

use App\Http\Repos\RoleRepo;
use App\Http\Repos\TcstaffRepo;
use App\Http\Controllers\Controller;
use DataTables;
use Yajra\DataTables\Html\Builder;

class StaffController extends Controller
{
    public function index(Builder $builder, TcstaffRepo $tcstaffRepo)
    {
        if (request()->ajax()) {
            return DataTables::of($tcstaffRepo->model->query())
                ->addColumn('role', function($qr){
                    $perm = "";
                    if($qr->user->roles->isNotEmpty()){
                        foreach($qr->user->roles as $role){
                            $perm .= "<span class='label label-plain label-sm'>".$role->name."</span> ";
                        }
                    }
                    return $perm;
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('tc.staff.edit', $qr->id)."' class='btn btn-success btn-sm'>Edit</button>";
                })
                ->rawColumns(['action', 'role'])
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
            ['data' => 'role',   'name' => 'role',  'title' => 'Roles'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action'
            ]
        ];
    }

    public function edit($id, TcstaffRepo $tcstaffRepo, RoleRepo $roleRepo)
    {
        $staff = $tcstaffRepo->find($id);
        $roles = $roleRepo->all();
        return view('tc.staff.edit', compact('staff', 'roles'));
    }

    public function update($id)
    {

    }
}
