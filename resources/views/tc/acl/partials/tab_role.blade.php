
<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle='modal' data-target='.bs-modal-lg' data-href='{{route('tc.acl.role.add')}}'>
        <i class="fa fa-plus"></i>
        Add Role
    </button>
</div>

<hr>
<div class="table-responsive">
    {!! $html->table(['class' => 'table table-bordered'], false) !!}
</div>


@if(request()->ajax())
{!! $html->scripts() !!}
@else
    @push('scripts')
        {!! $html->scripts() !!}
    @endpush
@endif