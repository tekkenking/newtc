<?php

namespace App\Http\Controllers\Agency;

use App\Http\Repos\AgencyRepo;
use App\Http\Repos\CustomerRepo;
use Mapper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    private function _getAgency()
    {
        return auth()->user()->profile->agency;
    }

    public function index(AgencyRepo $agencyRepo)
    {
        return view('agency.customer.index');
    }

    public function customerFilter(Request $request, AgencyRepo $agencyRepo)
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

    public function detail($id, CustomerRepo $customerRepo)
    {
        $agencyID = auth()->user()->profile->agency_id;
        $customer = $customerRepo->details($id, $agencyID);
        Mapper::map($customer->flat[0]->building->lat, $customer->flat[0]->building->lng);
        return view('agency.customer.detail', compact('customer'));
    }
}
