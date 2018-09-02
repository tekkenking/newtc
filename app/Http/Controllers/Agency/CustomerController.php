<?php

namespace App\Http\Controllers\Agency;

use App\Http\Repos\AgencyRepo;
use App\Http\Repos\CustomerRepo;
use App\Http\Repos\ServicedhistoryRepo;
use Mapper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class CustomerController extends Controller
{
    private function _getAgency()
    {
        return auth()->user()->profile->agency;
    }

    public function index(Request $request, AgencyRepo $agencyRepo)
    {
        if( $request->ajax() ) {
            return $this->_customerFilter($request, $agencyRepo);
        }

        return view('agency.customer.index');
    }

    private function _customerFilter($request, $agencyRepo)
    {
        $agencyID = $this->_getAgency()->id;

        $dbResult = [];
        //Filter by column
        if($request->field === 'reset' || !$request->qquery) {
            $dbResult = $agencyRepo->customers($agencyID);
        }

        elseif($request->field === 'accountid') {
            $dbResult = $agencyRepo->filterAccountID($agencyID, $request->qquery);
        }

        elseif($request->field === 'flatname') {
            $dbResult = $agencyRepo->filterFlatName($agencyID, $request->qquery);
        }

        elseif($request->field === 'customername') {
            $dbResult = $agencyRepo->filterCustomerName($agencyID, $request->qquery);
        }

        elseif($request->field === 'state') {
            $dbResult = $agencyRepo->filterStateName($agencyID, $request->qquery);
        }

        elseif($request->field === 'lga') {
            $dbResult = $agencyRepo->filterLgaName($agencyID, $request->qquery);
        }

        return DataTables::of($dbResult)
            ->editColumn('name', function($qr){
                return "<a href='".route('agency.customer.detail', $qr->id)."' class='text-bold text-info'>{$qr->name}</a>";
            })
            ->addColumn('bill_package', function($qr){
                return "<span class=' font-sm'>".format_currency($qr->agencybilling[0]->amount)." - ".$qr->agencybilling[0]->name."</span>";
            })
            ->addColumn('accountid', function($qr){
                return $qr->accountid;
            })
            ->rawColumns(['name', 'bill_package'])
            ->toJson();
    }

    public function detail($flatid, CustomerRepo $customerRepo)
    {
        $agencyID = $this->_getAgency()->id;
        $customer = $customerRepo->details($flatid, $agencyID);
        Mapper::map($customer->flat[0]->building->lat, $customer->flat[0]->building->lng);

        if(request()->ajax()) {
            return view('agency.customer.tabs.contactinfo', compact('customer'))
                ->render();
        }

        return view('agency.customer.detail', compact('customer'));
    }

    public function serviceHistory ($flatid, AgencyRepo $agencyRepo, Builder $builder)
    {
        $agencyID = $this->_getAgency()->id;

        if(request()->draw) {
            $query = $agencyRepo->serviceCustomerHistory($agencyID, $flatid);
            return DataTables::of($query)
                ->editColumn('servicestatus.name', function($qr){
                    return "<span class='font-sm text-bold text-".$qr->servicestatus->color()."'>".$qr->servicestatus->name."</span>";
                })
                ->editColumn('amount', function($qr){
                    return "<span class=' font-sm'>".format_currency($qr->amount)."</span>";
                })
                ->editColumn('created_at', function($qr){
                    return "<span class='font-bold'>".dateformat($qr->created_at, true)."</span>";
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='' class='btn btn-mint btn-xs text-bold'>Location</button>";
                })
                ->rawColumns(['servicestatus.name', 'amount', 'created_at', 'action'])
                ->toJson();
        }

        $builder->ajax(route('agency.customer.servicehistory', $flatid));
        $html = $builder->columns([
            ['data' => 'agencystaff.fullname', 'name' => 'agencystaff.fullname', 'title' => 'Staff Name'],
            ['data' => 'servicestatus.name', 'name' => 'servicestatus.name', 'title' => 'Status'],
            ['data' => 'amount', 'name' => 'amount', 'title' => 'Amount'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Datetime'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Location'],
        ]);
        return view('agency.customer.tabs.servicehistory', compact('html'));
    }

    public function paymentHistory ($flatid)
    {
        return view('agency.customer.tabs.paymenthistory');
    }
}
