@extends('agency.layouts.master')

@section('title', 'List Agency staff')

@section('headertitle', "{$agency->name} staffs")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="text-right">
                        <button type="button" class="btn btn-danger text-bold" data-toggle='modal' data-target='.bs-modal-lg' data-href='{{route('agency.staff.add')}}'>
                            <i class="fa fa-plus"></i>
                            Add Staff
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