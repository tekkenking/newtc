<select name="state_id" class="form-control" data-step="1">
    <option value="">Select state</option>
    @foreach($states as $state)
        <option
                value="{{$state->id}}"
                @if($default_id && $default_id === $state->id) selected="selected" @endif>
            {{$state->name}}
        </option>
    @endforeach
</select>

<script type="text/javascript">
    $('[name="state_id"]').on('change', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $.get("{{route('get.state.lgas')}}?id="+$(this).val(), function(res){
            $('#lga-here').removeProp('disabled').html(res);
        });
    })
</script>
