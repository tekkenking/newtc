<?php

namespace App\Http\Controllers\Tc;

use App\Http\Repos\PermissionRepo;
use App\Http\Repos\RoleRepo;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class AclController extends Controller
{
    public function getRoles(Builder $builder, RoleRepo $roleRepo)
    {
        if (request()->ajax() && !request()->tab) {
            return DataTables::of($roleRepo->model->query())
                ->addIndexColumn()
                ->addColumn('permissions', function($qr){
                    $perm = "";
                    foreach($qr->permissions as $permission){
                        $perm .= "<span class='label label-plain label-sm'>".$permission->name."</span> ";
                    }
                    return $perm;
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('acl.role.edit', $qr->id)."' class='btn btn-success btn-sm'>Edit</button>";
                })
                ->rawColumns(['permissions', 'action'])
                ->toJson();
        }

        $columns = $this->_getColumns();
        array_push($columns, [
            'data' => 'permissions',
            'name' => 'permissions',
            'title' => 'Permissions']);

        if(request()->ajax() && request()->tab) {
            $html = $builder->columns($columns);
            return view('tc.acl.partials.tab_role', compact('html'))
                ->render();
        }

        $html = $builder->columns($columns);
        return view('tc.acl.index', compact('html'));
    }

    public function addRole(PermissionRepo $permissionRepo)
    {
        $permissions = $permissionRepo->all();
        return view('tc.acl.role.add', compact('permissions'));
    }

    public function storeRole(RoleRepo $roleRepo)
    {
        request()->validate([
            'name'          =>  'required|unique:roles|max:200',
            'permissions'   =>  'required'
        ]);

        //Then we create the role
        $roleModel = $roleRepo->create([
            'name'  =>  request()->name
        ]);

        //Then we attach
        $roleModel->syncPermissions(request()->permissions);

        return response()->json(['status' => 'success', 'message' => 'role created!']);
    }

    public function editRole($id, RoleRepo $roleRepo, PermissionRepo $permissionRepo)
    {
        $role = $roleRepo->find($id);
        $permissions = $permissionRepo->all();

        return view('tc.acl.role.edit', compact('role', 'permissions'));
    }

    public function updateRole(RoleRepo $roleRepo)
    {
        request()->validate([
            'name'          =>  'required|unique:roles|max:200',
            'permissions'   =>  'required'
        ]);
        $id = request()->id;
        $roleRepo->update($id, ['name' => request()->name]);
        $roleRepo->find($id)->syncPermissions(request()->permissions);

        return response()->json(['status' => 'success', 'message' => 'role updated!']);
    }

    public function getPermissions(Builder $builder, PermissionRepo $permissionRepo)
    {
        if (request()->ajax() && !request()->tab) {
            return DataTables::of($permissionRepo->model->query())
                ->addIndexColumn()
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-nm' data-href='".route('acl.permission.edit', $qr->id)."' class='btn btn-success btn-sm'>Edit</button>";
                })
                ->toJson();
        }

        $builder->ajax(route('acl.permission.index'));

        $html = $builder->columns( $this->_getColumns() );

        return view('tc.acl.partials.tab_permission', compact('html'))
            ->render();
    }

    public function addPermission()
    {
        return view('tc.acl.permission.add');
    }

    public function storePermission(PermissionRepo $permissionRepo)
    {
        request()->validate([
            'name'  =>  'required|unique:permissions|max:200'
        ]);

        $permissionRepo->create(request()->except('_token'));
        return response()->json(['status' => 'success', 'message' => 'Permission added!']);
    }

    public function editPermission($id, PermissionRepo $permissionRepo)
    {
        $permission = $permissionRepo->find($id);
        return view('tc.acl.permission.edit', compact('permission'));
    }

    public function updatePermission(PermissionRepo $permissionRepo)
    {
        request()->validate([
            'name' =>   'required|unique:permissions|max:200'
        ]);

        $permissionRepo->update(request()->id, request()->except('_token'));
        return response()->json(['status' => 'success', 'message' => 'Permission updated!']);
    }

    private function _getColumns()
    {
        return [
            ['data' => 'name',   'name' => 'name',  'title' => 'Name'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action'
            ]
        ];
    }
}
