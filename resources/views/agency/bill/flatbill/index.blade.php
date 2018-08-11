@extends('agency.layouts.master')

@section('title', 'Manage Bill')

@section('headertitle', 'Manage Bill')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="text-right">
                        <button type="button" class="btn btn-danger btn-sm text-bold" data-toggle='modal' data-target='.bs-modal-nm' data-href='{{route('agency.bill.add')}}'>
                            <i class="fa fa-plus"></i>
                            Add Bill Package
                        </button>
                    </div>

                    <hr>
                    <div class="table-responsive">
                        {!! $html->table(['class' => 'table table-bordered font-sm'], false) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush