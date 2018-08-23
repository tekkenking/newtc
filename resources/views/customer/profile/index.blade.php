@extends('customer.layouts.master')

@php $customer = auth()->user();  @endphp

@section('title', $customer->profile->fullname . ' Profile')

@section('headertitle', $customer->profile->fullname . ' Profile')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-body">
                    <h3>
                        {{$customer->profile->fullname}} Profile
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

@endsection
