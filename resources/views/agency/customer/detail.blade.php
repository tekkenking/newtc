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
                    <a data-toggle="tab" href="#demo-lft-tab-1">Contact Info</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#demo-lft-tab-2">Activity log</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#demo-lft-tab-3">Payment History</a>
                </li>
            </ul>

            <!--Tabs Content-->
            <div class="tab-content">
                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                    @include('agency.customer.tabs.contactinfo')
                </div>
                <div id="demo-lft-tab-2" class="tab-pane fade">
                    <p class="text-main text-semibold">Second Tab Content</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                </div>
                <div id="demo-lft-tab-3" class="tab-pane fade">
                    <p class="text-main text-semibold">Third Tab Content</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
