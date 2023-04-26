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

                @php
                    $user_id = $contents->id; // contents is user with his posts and comments
                    $current_route = Route::currentRouteName(); // check if current route is profile or user.comments
                @endphp

                <li class="nav-item" style="list-style:none">
                    <a class="nav-link {{ $current_route == 'profile' ? 'active' : '' }}" href="{{ route('profile' , $user_id) }}"> {{ __('منشوراتي') }} </a>
                </li>
                <li class="nav-item" style="list-style:none">
                    <a class="nav-link {{ $current_route == 'user.comments' ? 'active' : '' }}" href="{{ route('user.comments' , $user_id) }}"> {{ __('تعليقاتي') }} </a>
                </li>
            </ul>



            @if ($current_route == 'profile')
                @include('user.posts_section')
            @else
                @include('user.comments_section')
            @endif



        </div>
    </div>
@endsection
