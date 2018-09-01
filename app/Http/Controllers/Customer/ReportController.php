<?php

namespace App\Http\Controllers\Customer;

use App\Http\Repos\AgencybillingarrearRepo;
use App\Http\Repos\PaymenthistoryRepo;
use App\Http\Repos\ServicedhistoryRepo;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ReportController extends Controller
{
    private $flat;

    public function index(Builder $builder, ServicedhistoryRepo $servicedhistoryRepo)
    {
        if (request()->ajax() && !request()->tab) {
            return DataTables::of($servicedhistoryRepo->getServicedhistory($this->_getFlatId()))
                ->editColumn('amount', function($qr) {
                    return format_currency($qr->amount, true);
                })
                ->editColumn('servicestatus.name', function($qr) {
                    $color = 'text-'.$qr->servicestatus->color();
                    return "<span class='text-bold ".$color."'>".$qr->servicestatus->name."</span>";
                })
                ->editColumn('created_at', function($qr) {
                    return dateformat($qr->created_at, true);
                })
                ->rawColumns(['amount', 'servicestatus.name', 'created_at', 'action'])
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('acl.role.edit', $qr->id)."' class='btn btn-info btn-xs text-bold'>Detail</button>";
                })
                ->toJson();
        }

        $html = $builder->columns($this->_getServicedColumn());
        if(request()->ajax() && request()->tab) {
            return view('customer.report.servicedhistories', compact('html'))
                ->render();
        }

        return view('customer.report.tabs', compact('html'));
    }

    private function _getServicedColumn()
    {
        return [
            ['data' => 'agency.name',   'name' => 'agency.name',  'title' => 'Agency Name'],
            ['data' => 'amount',   'name' => 'amount',  'title' => 'Charged'],
            ['data' => 'servicestatus.name',   'name' => 'servicestatus.name',  'title' => 'Status'],
            ['data' => 'created_at',   'name' => 'created_at',  'title' => 'Date'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action'
            ]
        ];
    }

    public function paymenthistory(Builder $builder, PaymenthistoryRepo $paymenthistoryRepo)
    {
        if (request()->ajax() && request()->draw) {
            return DataTables::of($paymenthistoryRepo->getPaymenthistory($this->_getFlatId()))
                ->editColumn('amount', function($qr) {
                    return format_currency($qr->amount, true);
                })
                ->editColumn('created_at', function($qr) {
                    return dateformat($qr->created_at, true);
                })
                ->editColumn('status.name', function($qr) {
                    return "<span class='text-bold ".$qr->status->color()."'>{$qr->status->name}</span>";
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('acl.role.edit', $qr->id)."' class='btn btn-info btn-xs text-bold'>Detail</button>";
                })
                ->rawColumns(['amount', 'status.name', 'created_at', 'action'])
                ->toJson();
        }
        $builder->ajax(route('customer.report.paymenthistory'));
        $html = $builder->columns($this->_getPaymenthistoryColumn());
        return view('customer.report.servicedhistories', compact('html'));
    }

    private function _getPaymenthistoryColumn()
    {
        return [
            ['data' => 'status.name',   'name' => 'status.name',  'title' => 'Status'],
            ['data' => 'transaction_ref',   'name' => 'transaction_ref',  'title' => 'Transaction Ref'],
            ['data' => 'amount',   'name' => 'amount',  'title' => 'Amount'],
            ['data' => 'paymenttype.name',   'name' => 'paymenttype.name',  'title' => 'Channel'],
            ['data' => 'created_at',   'name' => 'created_at',  'title' => 'Date'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action'
            ]
        ];
    }

    public function billhistory(Builder $builder, AgencybillingarrearRepo $agencybillingarrearRepo)
    {
        if (request()->ajax() && request()->draw) {
            return DataTables::of($agencybillingarrearRepo->getBillinghistory($this->_getFlatId()))
                ->editColumn('agencybilling.amount', function($qr) {
                    return format_currency($qr->agencybilling->amount, true);
                })
                ->editColumn('discounted_amount', function($qr) {
                    return format_currency($qr->discount_amount, true);
                })
                ->editColumn('paid_date', function($qr) {
                    return dateformat($qr->paid_date, true);
                })
                ->editColumn('created_at', function($qr) {
                    return dateformat($qr->created_at, true);
                })
                ->editColumn('paymenthistory.status.name', function($qr) {
                    if(!$qr->paymenthistory) {
                        return 'N/A';
                    }
                    return "<span class='text-bold ".$qr->paymenthistory->status->color()."'>{$qr->paymenthistory->status->name}</span>";
                })
                ->addColumn('action', function($qr) {
                    return "<button type='button' data-toggle='modal' data-target='.bs-modal-lg' data-href='".route('acl.role.edit', $qr->id)."' class='btn btn-info btn-xs text-bold'>Detail</button>";
                })
                ->rawColumns(['agencybilling.amount', 'paid_date', 'created_at', 'discounted_amount', 'action', 'paymenthistory.status.name'])
                ->toJson();
        }

        $builder->ajax(route('customer.report.billhistory'));
        $html = $builder->columns($this->_getBillhistoryColumn());
        return view('customer.report.billhistories', compact('html'));
    }

    private function _getBillhistoryColumn()
    {
        return [
            ['data' => 'agency.name',   'name' => 'agency.name',  'title' => 'Agency name'],
            ['data' => 'agencybilling.amount',   'name' => 'agencybilling.amount',  'title' => 'Agency name'],
            ['data' => 'paymenthistory.status.name',   'name' => 'paymenthistory.status.name',  'title' => 'Payment status'],
            ['data' => 'discounted_amount',   'name' => 'discounted_amount',  'title' => 'Discount'],
            ['data' => 'paid_date',   'name' => 'paid_date',  'title' => 'Paid Date'],
            ['data' => 'created_at',   'name' => 'created_at',  'title' => 'Date'],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action'
            ]
        ];
    }

    private function _getFlatId()
    {
        return auth()->user()->profile->flat[0]->id;
    }
}
