@foreach ($categories as $category)
    <option value="{{ $category->id }}" @if ($category->id == $id) selected @endif>
        {{ $category->title }}
    </option>
@endforeach
