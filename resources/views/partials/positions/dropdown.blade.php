<select class="{{ $class ?? 'form-control' }}" name="{{ $name ?? 'position_id' }}" id="{{ $id ?? 'position_id' }}">
    @foreach($positions as $position)
        <option value="{{ $position->id }}"
                @if ($position->id == old('position_id', $employee->position_id ?? ''))
                selected="selected"
            @endif
        >{{ $position->name }}</option>
    @endforeach
</select>
