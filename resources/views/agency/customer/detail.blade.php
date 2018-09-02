@extends('agency.layouts.master')

@section('title', $customer->fullname .' details')

@section('headertitle', $customer->fullname .' details')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tab-base">

            <!--Nav Tabs-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#contact-info" data-url="{{route('agency.customer.detail', $customer->id)}}?tab=true">Contact Info</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#activity-log" data-url="{{route('agency.customer.servicehistory', $customer->id)}}">Service History</a>
                </li>
            </ul>

            <!--Tabs Content-->
            <div class="tab-content">
                <div id="contact-info" class="tab-pane fade active in">
                    <div class="panel-body">
                        @include('agency.customer.tabs.contactinfo')
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
