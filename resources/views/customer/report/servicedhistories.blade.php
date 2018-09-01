
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