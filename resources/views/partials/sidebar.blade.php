<div class="col-md-4">
    <div class="card">
        <h5 class="card-header"> {{ __('التصنيفات') }} </h5>
        <div class="card-body">
            <ul class="nav flex-column p-0" style="list-style: none !important;">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/') }}">{{ __('جميع التصنيفات') }} (
                        {{ $posts_number }})</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">{{ $category->title }}
                            ({{ $category->posts->count() }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


</div>
