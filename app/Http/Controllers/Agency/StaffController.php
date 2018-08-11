<?php

namespace App\Http\Controllers\Agency;

use App\Http\Repos\AgencyRepo;
use App\Http\Repos\AgencystaffRepo;
use App\Http\Repos\AgencystatusRepo;
use App\Http\Repos\StateRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class StaffController extends Controller
{
    public function index(Builder $builder, AgencyRepo $agencyRepo)
    {

        $agency= auth()->user()->profile->agency;

        //dd($agency->agencystaffs()->with('user', 'agencystatus')->get()->toArray());

        if (request()->ajax()) {
            $query = $agency->agencystaffs()->with('user', 'agencystatus')->select('agencystaffs.*');

            return DataTables::of($query)
                ->editColumn('user.can_login', function($qr) {
                    $word = ( $qr->user->can_login === 1 ) ? 'Yes' : 'No';
                    return "<span class='text-bold'>". $word ."</span>";
                })->editColumn('is_admin', function($qr) {
                    $word = ( $qr->is_admin === 1 ) ? 'Yes' : 'No';
                    return "<span class='text-bold'>". $word ."</span>";
                })->editColumn('agencystatus.name', function($qr) {
                    $style = ( $qr->agencystatus_id === 1 ) ? 'text-success' : 'text-danger';
                    return "<span class='text-bold ".$style."'>". $qr->agencystatus->name ."</span>";
                })
                /*->editColumn('fullname', function ($qr){
                    return "<a  href='".route('tc.agency.details.index', $qr->id)."' class='text-bold text-info'>$qr->fullname</a>";
                })*/
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('agency.staff.edit', $qr->id)."' class='btn btn-mint btn-xs text-bold'>Edit</button>";
                })
                ->rawColumns(['action', 'agencystatus.name', 'user.can_login', 'is_admin'])
                ->toJson();
        }

        $columns = $this->_getColumns();
        $html = $builder->columns($columns);
        return view('agency.staff.index', compact('html', 'agency'));
    }

    private function _getColumns()
    {
        return [
            ['data' => 'fullname',   'name' => 'fullname',  'title' => 'Name'],
            ['data' => 'user.phone',   'name' => 'user.phone',  'title' => 'Phone'],
            ['data' => 'user.can_login',   'name' => 'user.can_login',  'title' => 'Can login?'],
            ['data' => 'is_admin',   'name' => 'is_admin',  'title' => 'Is admin?'],
            [
                'data' => 'agencystatus.name',
                'name' => 'agencystatus.name',
                'title' => 'Status'
            ],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => ''
            ]
        ];
    }

    public function add(StateRepo $stateRepo)
    {
        $states = $stateRepo->all();
        $lgas = collect([]);
        return view('agency.staff.add', compact('states', 'lgas'));
    }

    public function store(AgencystaffRepo $agencystaffRepo)
    {
        $request = request();
        $request->validate([
            'fullname'  =>  'required|max:100',
            'phone'     =>  ['required', Rule::unique('users'), 'max:15'],
            'alt_phone'     =>  ['max:15'],
            'email'     =>  [Rule::unique('users'), 'email'],
            'lga'       =>  ['required'],
            'address'   =>  ['required']
        ]);

        $user = auth()->user();

        $agencystaffRepo->saveStaff($request, $user);
        return response()->json(['status' => 'success', 'message' => 'Staff created successfully!']);
    }

    public function edit($id, AgencystaffRepo $agencystaffRepo, AgencystatusRepo $agencystatusRepo, StateRepo $stateRepo)
    {
        $staff = $agencystaffRepo->find($id);
        $agencystatuses = $agencystatusRepo->all();
        $states = $stateRepo->all();

        //Load state lgas
        $state_id = $staff->lga->state->id;
        $lgas = $stateRepo->find($state_id)->lgas;

        return view('agency.staff.edit', compact('staff', 'agencystatuses', 'states', 'lgas'));
    }

    public function update($id, AgencystaffRepo $agencystaffRepo)
    {
        $request = request();
        $userid = $request->usrid;
        $request->validate([
            'fullname'  =>  'required|max:100',
            'phone'     =>  ['required', Rule::unique('users')->ignore($userid), 'max:15'],
            'alt_phone'     =>  ['max:15'],
            'email'     =>  [Rule::unique('users')->ignore($userid), 'email'],
            'lga'       =>  ['required'],
            'address'   =>  ['required']
        ]);

        $agencystaffRepo->updateStaff($id, $request);

        return response()->json(['status' => 'success', 'message' => 'Staff updated successfully']);
    }
}
