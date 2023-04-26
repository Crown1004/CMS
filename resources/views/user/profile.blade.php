@extends('layouts.main')

@section('content')
    <div class="container text-muted">
        <div class="row mb-4">
            <div>
                <img src="{{ $contents->profile_photo_url }}" width="150px" class="rounded-full mx-auto" />
                <h2 class="text-center mt-1">{{ $contents->name }}</h2>
            </div>
        </div>

        <div class="row p-3">
            <ul class="nav nav-tabs mb-3">
                    <li style="list-style:none"><a class="nav-link" href="">posts</a></li>
                    <li style="list-style:none"><a class="nav-link" href="">comments</a></li>
            </ul>

        </div>
    </div>
@endsection
