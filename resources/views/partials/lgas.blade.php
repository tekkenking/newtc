<select name="{{$name or 'lga_id'}}" class="form-control">
    <option value="">Select lga</option>
    @if(isset($lgas) && $lgas->isNotEmpty())
        @foreach($lgas as $lga)
            <option
                    value="{{$lga->id}}"
                    @if(isset($default_id) && $default_id === $lga->id) selected="selected" @endif>
                {{$lga->name}}
            </option>
        @endforeach
    @endif
</select>