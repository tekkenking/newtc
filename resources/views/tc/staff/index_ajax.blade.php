{!! $html->table(['class' => 'table table-bordered font-sm'], false) !!}


@if(request()->ajax())
    {!! $html->scripts() !!}
@endif