@foreach($data['options'] as $options)
    <option value="0" @if($staff->is_admin === $data['default']) selected="selected" @endif>No</option>
@endforeach