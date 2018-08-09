@extends('tc.layouts.master')

@section('title', 'List Agencies')

@section('headertitle', 'List Agencies')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle='modal' data-target='.bs-modal-lg' data-href='{{route('tc.agency.add')}}'>
                            <i class="fa fa-plus"></i>
                            Add Agency
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