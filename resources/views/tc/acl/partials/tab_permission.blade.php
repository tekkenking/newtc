
<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle='modal' data-target='.bs-modal-nm' data-href='{{route('tc.acl.permission.add')}}'>
        <i class="fa fa-plus"></i>
        Add Permission
    </button>
</div>

<hr>
<div class="table-responsive">
    {!! $html->table(['class' => 'table table-bordered'], false) !!}
</div>

{!! $html->scripts() !!}