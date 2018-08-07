@extends('tc.layouts.master')

@section('title', 'Manage Roles & Permissions')

@section('headertitle', 'Manage Roles & Permissions')

@section('content')

    <div class="tabs-container">
        <ul class="nav nav-tabs" role="tablist">
            <li><a class="nav-link active" data-toggle="tab" href="#roles" data-url="{{route('acl.role.index')}}?tab=true"> Roles</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#permissions" data-url="{{route('acl.permission.index')}}?tab=true">Permissions</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" id="roles" class="tab-pane active">
                <div class="panel-body">
                    @include('tc.acl.partials.tab_role')
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