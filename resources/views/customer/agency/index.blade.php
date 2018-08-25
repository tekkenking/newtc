@extends('customer.layouts.master')

@section('title', 'List of agencies serving you')

@section('headertitle', 'List of agencies service you')

@section('content')

    @if($agencies->isNotEmpty())
        @foreach($agencies->chunk(2) as $chunk)
            <div class="row">
                @foreach($chunk as $agency)
                    <div class="col-md-6">

                        <div class="panel widget">
                            <div class="widget-header bg-{{customer_agency_color($flat, $agency, ['warning' => 'warning-black'])}} text-center">
                                <h4 class="mar-no pad-top">
                                    {{$agency->name}}
                                </h4>
                                <p class="mar-btm">
                                    {{$agency->agencycategory->description}}
                                </p>
                            </div>
                            <div class="widget-body">
                                <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="{{asset('imgs/agency.png')}}">

                                <div class="list-group bg-trans mar-no">

                                    @php
                                        $arrears = billOrBalance($flat, $agency);
                                        //dump($arrears->toArray());
                                    @endphp
                                    @if(is_object($arrears))
                                        <div class="list-group-item list-item-sm font-sm">
                                        <span class="label label-danger pull-right text-bold font-sm">
                                            {{format_currency($arrears->agencybilling->amount - $arrears->discounted_amount, true)}}
                                        </span>
                                            Bill
                                        </div>
                                    @else
                                        <div class="list-group-item list-item-sm font-sm">
                                            <span class="label label-{{customer_agency_color($flat, $agency, ['warning' => 'warning-black'])}} pull-right text-bold font-sm">
                                                {{customer_agency_balance($flat, $agency)}}
                                            </span>
                                            Balance
                                        </div>
                                    @endif



                                    <div class="list-group-item list-item-sm font-sm">
                                        <span class="pull-right text-bold font-sm">
                                            {{dateformat(qr_lastAgencyServiceDate($flat, $agency), true)}} | @php
                                                $service = qr_lastAgencyService($flat, $agency);
                                                $servicestatus = 'N/A';
                                                if($service){
                                                    $servicestatus = $service->servicestatus->name;
                                                }
                                            @endphp
                                            {{$servicestatus}}
                                        </span>
                                        Last service date | status
                                    </div>
                                    <div class="list-group-item list-item-sm font-sm">
                                        <span class="label label-default pull-right text-bold font-sm">
                                            {{$agency->pivot->accountid}}
                                        </span>
                                        Account ID
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endforeach
    @endif

@endsection