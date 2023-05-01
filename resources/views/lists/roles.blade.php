@foreach ($roles as $role)
    <option value="{{ $role->id }}" @if ($role->id == $id) selected @endif> {{ $role->role }} </option>
@endforeach
