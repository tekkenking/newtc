<?php

namespace App\Http\Controllers\Agency;

use App\Http\Repos\AgencystatusRepo;
use App\Http\Repos\FlatbillRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class BillController extends Controller
{
    public function fixedIndex(Builder $builder)
    {
        $agency= auth()->user()->profile->agency;
        if (request()->ajax()) {
            $query = $agency->flatbills()->with('agencystatus')->select('flatbills.*');

            return DataTables::of($query)
                ->editColumn('agencystatus.name', function($qr) {
                    $style = ( $qr->agencystatus_id === 1 ) ? 'text-success' : 'text-danger';
                    return "<span class='text-bold ".$style."'>". $qr->agencystatus->name ."</span>";
                })->editColumn('amount', function($qr) {
                    return format_currency($qr->amount, true);
                })->editColumn('pending_amount', function($qr) {
                    if($qr->pending_amount > 0) {
                        return format_currency($qr->pending_amount, true).'<br> <span class="label label-warning">Awaiting approval</span>';
                    }
                    return format_currency($qr->pending_amount, true);
                })->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-nm' data-href='".route('agency.bill.edit', $qr->id)."' class='btn btn-mint btn-xs text-bold'>Edit</button>";
                })
                ->rawColumns(['action', 'agencystatus.name', 'pending_amount'])
                ->toJson();
        }

        $columns = [
            ['data' => 'name',   'name' => 'name',  'title' => 'Name'],
            ['data' => 'amount',   'name' => 'amount',  'title' => 'Amount'],
            ['data' => 'pending_amount',   'name' => 'pending_amount',  'title' => 'Pending Amount'],
            ['data' => 'description',   'name' => 'description',  'title' => 'Description'],
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
        $html = $builder->columns($columns);
        return view('agency.bill.flatbill.index', compact('html', 'agency'));
    }

    public function add(AgencystatusRepo $agencystatusRepo)
    {
        $agencystatuses = $agencystatusRepo->all();
        return view('agency.bill.flatbill.add', compact('agencystatuses'));
    }

    public function store(Request $request)
    {
        $agency = auth()->user()->profile->agency;
        $request->validate([
            'name'      =>  'required|max:50',
            'amount'    =>  ['required', 'numeric', Rule::unique('Agencybillings')
                ->where(function($qr) use ($agency){
                return $qr->where('agency_id', $agency->id);
            })],
            'description'   =>  'required'
        ]);

        $agency->flatbills()->create($request->except('_token'));
        return response()->json([
            'status'    =>  'success',
            'message'   =>  'Added successfully!!'
        ]);
    }

    public function edit($id, FlatbillRepo $flatbillRepo, AgencystatusRepo $agencystatusRepo)
    {
        $bill = $flatbillRepo->find($id);
        $agencystatuses = $agencystatusRepo->all();
        return view('agency.bill.flatbill.edit', compact('bill', 'agencystatuses'));
    }

    public function update($id, Request $request, FlatbillRepo $flatbillRepo)
    {
        $agency = auth()->user()->profile->agency;
        $request->validate([
            'name'      =>  'required|max:50',
            'amount'    =>  ['required', 'numeric', Rule::unique('Agencybillings')
                ->where(function($qr) use ($agency){
                    return $qr->where('agency_id', $agency->id);
                })->ignore($id)],
            'description'   =>  'required'
        ]);

        $flatbillRepo->updateBill($id, $request);

        //$agency->flatbills()->create($request->except('_token'));
        return response()->json([
            'status'    =>  'success',
            'message'   =>  'Updated successfully!!'
        ]);
    }
}
