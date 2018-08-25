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
                    <a data-toggle="tab" href="#demo-lft-tab-1">Home <span class="badge badge-purple">27</span></a>
                </li>
                <li>
                    <a data-toggle="tab" href="#demo-lft-tab-2">Profile</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#demo-lft-tab-3">Setting</a>
                </li>
            </ul>

            <!--Tabs Content-->
            <div class="tab-content">
                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                    <p class="text-main text-semibold">First Tab Content</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
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