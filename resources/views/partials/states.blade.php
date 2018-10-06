<select id="{{$state_id or 'state_here'}}" name="{{$name or 'state_id'}}" class="form-control">
    <option value="" class="placeholder">Select state</option>
    @foreach($states as $state)
        <option
                value="{{$state->id}}"
                @if(isset($default_id) && $default_id === $state->id) selected="selected" @endif>
            {{$state->name}}
        </option>
    @endforeach
</select>

<script type="text/javascript">
    $("#{{$state_id or 'state_here'}}").on('change', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $.get("{{route('get.state.lgas')}}?id="+$(this).val(), function(res){
            $("#{{$target_id or 'lga-here'}}")
                .removeProp('disabled')
                .html(res)
                .find('select')
                .prop('name', "{{$target_lga_name or 'lga_id'}}");
        });
    })
</script>
