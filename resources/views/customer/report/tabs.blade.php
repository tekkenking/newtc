@extends('customer.layouts.master')

@section('title', 'Reports')

@section('headertitle', 'Reports')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="tab-base">

            <!--Nav Tabs-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#servicehistory" data-url="{{route('customer.report.tabs')}}?tab=true">Serviced History</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#paymenthistory" data-url="{{route('customer.report.paymenthistory')}}">Payment history</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#billhistory" data-url="{{route('customer.report.billhistory')}}">Bill History</a>
                </li>
            </ul>

            <!--Tabs Content-->
            <div class="tab-content">
                <div id="servicehistory" class="tab-pane fade active in">
                    <div class="panel-body">
                        @include('customer.report.servicedhistories')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('[data-toggle="tab"]').ajaxtab();
        })
    </script>
@endpush