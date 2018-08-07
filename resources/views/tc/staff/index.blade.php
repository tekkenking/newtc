@extends('tc.layouts.master')

@section('title', 'List staffs');

@section('headertitle', 'List staff')

@section('content')

   <div class="row">
       <div class="col-md-12">
           <div class="ibox">
               <div class="ibox-content">
                   <div class="text-right">
                       <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle='modal' data-target='.bs-modal-nm' data-href='{{route('tc.staff.add')}}'>
                           <i class="fa fa-plus"></i>
                           Add Staff
                       </button>
                   </div>

                   <hr>
                   <div class="table-responsive">
                       {!! $html->table(['class' => 'table table-bordered'], false) !!}
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush