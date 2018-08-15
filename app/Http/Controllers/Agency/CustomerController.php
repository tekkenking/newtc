<?php

namespace App\Http\Controllers\Agency;

use App\Http\Repos\AgencyRepo;
use App\Http\Repos\CustomerRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index(AgencyRepo $agencyRepo)
    {
        return view('agency.customer.index');
    }

    public function customerFilter(Request $request, AgencyRepo $agencyRepo)
    {
        $agencyID = auth()->user()->profile->agency_id;

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
            ->addColumn('accountid', function($qr){
                return $qr->accountid;
            })
            ->addColumn('action', function($qr) {
                return "<a href='".route('agency.customer.detail', $qr->id)."' class='btn btn-mint btn-xs text-bold'>more..</a>";
            })
            ->toJson();
    }

    public function detail($id, CustomerRepo $customerRepo)
    {
        $agencyID = auth()->user()->profile->agency_id;
        $customer = $customerRepo->details($id, $agencyID);
        return view('agency.customer.detail', compact('customer'));
    }
}
