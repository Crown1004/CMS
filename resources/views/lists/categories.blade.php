@foreach ($categories as $category)
    <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif>
        {{ $category->title }}
    </option>
@endforeach
