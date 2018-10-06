<?php

namespace App\Http\Controllers\Tc;

use App\Http\Controllers\Controller;
use App\Http\Repos\AgencycategoryRepo;
use App\Http\Repos\AgencymodeRepo;
use App\Http\Repos\AgencyRepo;
use App\Http\Repos\AgencystatusRepo;
use App\Http\Repos\BankRepo;
use App\Http\Repos\GenderRepo;
//use App\Http\Repos\LgaRepo;
use App\Http\Repos\StateRepo;
use App\Http\Requests\StoreAgency;
use App\Jobs\SendSms;
use App\Notifications\NewAgency;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Libs\Sms\SmsLib;

class AgencyController extends Controller
{

    public function index(Builder $builder, AgencyRepo $agencyRepo)
    {
        if (request()->ajax()) {
            return DataTables::of($agencyRepo->model->with('agencystatus')->select('agencies.*'))
                ->editColumn('agencystatus.name', function($qr) {
                    $style = ( $qr->agencystatus_id === 1 ) ? 'text-info' : 'text-danger';
                    return "<span class='font-bold ".$style."'>". $qr->agencystatus->name ."</span>";
                })
                ->editColumn('name', function ($qr){
                    return "<a  href='".route('tc.agency.details.index', $qr->id)."' class='font-bold'>$qr->name</a>";
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('tc.agency.edit', $qr->id)."' class='btn btn-success btn-xs'>Edit</button>";
                })
                ->rawColumns(['action', 'agencystatus.name', 'name'])
                ->toJson();
        }

        $columns = $this->_getColumns();
        $html = $builder->columns($columns);
        return view('tc.agency.index', compact('html'));
    }

    public function add(
        AgencycategoryRepo $agencycategoryRepo,
        AgencystatusRepo $agencystatusRepo,
        AgencymodeRepo $agencymodeRepo,
        StateRepo $stateRepo,
        BankRepo $bankRepo,
        GenderRepo $genderRepo
    )
    {
        $categories = $agencycategoryRepo->all();
        $statuses = $agencystatusRepo->all();
        $modes  = $agencymodeRepo->all();
        $states = $stateRepo->all();
        $banks = $bankRepo->all();
        $genders = $genderRepo->all();

        return view('tc.agency.add', compact('categories', 'statuses', 'modes', 'states', 'banks', 'genders'));
    }

    public function store(StoreAgency $request, AgencyRepo $agencyRepo)
    {
        $agencyAdmin = $agencyRepo->TCstaff_createAgency($request);

        //Send SMS notification to the agency admin
        $this->dispatch(new SendSms([
            'to'    =>  $agencyAdmin->phone,
            'body'   =>  __('sms.tc.register_agency')
        ]));

        //To send email notification
        $agencyAdmin->notify(new NewAgency());

        return response()->json([
            'status' => 'success',
            'message' => 'Agency registered successfully'
        ]);
    }

    public function edit($agentID)
    {

    }

    public function update()
    {

    }

    private function _getColumns()
    {
        return [
            ['data' => 'name',   'name' => 'name',  'title' => 'Name'],
            ['data' => 'phone',   'name' => 'phone',  'title' => 'Phone'],
            ['data' => 'email',   'name' => 'email',  'title' => 'Email'],
            ['data' => 'token',   'name' => 'token',  'title' => 'Agent token'],
            ['data' => 'agencystatus.name',   'name' => 'agencystatus.name',  'title' => 'Status'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => ''
            ]
        ];
    }


    public function detailsIndex($id, AgencyRepo $agencyRepo)
    {
        $agency = $agencyRepo->find($id);

        if(request()->ajax()){
            return view('tc.agency.details.partials.tab_customers', compact('agency'));
        }

        return view('tc.agency.details.index', compact('agency'));
    }

    public function detailsPackages($id, AgencyRepo $agencyRepo)
    {
        $agency = $agencyRepo->find($id);
        return view('tc.agency.details.partials.tab_packages', compact('agency'));
    }

    public function detailsInfo($id, AgencyRepo $agencyRepo)
    {
        $agency = $agencyRepo->find($id);
        return view('tc.agency.details.partials.tab_info', compact('agency'));
    }

}
