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
                    <a data-toggle="tab" href="#contact-info">Contact Info</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#activity-log">Activity log</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#payment-history">Payment History</a>
                </li>
            </ul>

            <!--Tabs Content-->
            <div class="tab-content">
                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                    @include('agency.customer.tabs.contactinfo')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
