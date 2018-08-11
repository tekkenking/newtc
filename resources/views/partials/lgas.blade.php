<select name="lga" class="form-control" data-step="2">
    <option value="">Select lga</option>
    @if($lgas->isNotEmpty())
        @foreach($lgas as $lga)
            <option
                    value="{{$lga->id}}"
                    @if($default_id && $default_id === $lga->id) selected="selected" @endif>
                {{$lga->name}}
            </option>
        @endforeach
    @endif
</select>