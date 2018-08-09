@extends('tc.layouts.master')

@section('title', 'Agency Details')

@section('headertitle', "Details about {$agency->name} Agency")

@section('content')
    <div class="tabs-container">
        <ul class="nav nav-tabs" role="tablist">
            <li><a class="nav-link active" data-toggle="tab" href="#customers" data-url="{{route('tc.agency.details.index', $agency->id)}}?tab=true"> Customers</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#packages" data-url="{{route('tc.agency.details.packages', $agency->id)}}?tab=true">Packages</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#info" data-url="{{route('tc.agency.details.info', $agency->id)}}?tab=true">Agency Info</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" id="roles" class="tab-pane active">
                <div class="panel-body">
                    @include('tc.agency.details.partials.tab_customers')
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