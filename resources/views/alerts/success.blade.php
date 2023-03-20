@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }} {{-- back()->with('success' , 'the message') in the PostController --}}
    </div>
@endif
