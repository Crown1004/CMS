<div class="commentBody">
    @foreach ($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <img style="float:right" src="{{ $comment->user->profile_photo_url }}" width="50px"
                    class="rounded-full" />
                <p class="mt-2 me-3" style="display:inline-block;"><strong>{{ $comment->user->name }}</strong></p>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <i class="far fa-clock"></i> <span
                                class="comment_date text-secondary">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="col-4">
                            <span class="cursor-pointer reply-button">
                                <i class="fa-solid fa-reply"></i> <span class="comment_date text-secondary">
                                    {{ __('إضافة رد') }} </span>
                            </span>
                        </div>
                    </div>
                    <p class="my-3">{{ $comment->body }}</p>

                    @auth
                        <form action="{{ route('reply.add') }}" method="post" class="reply" id="reply">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control @error('comment_body') is-invalid @enderror" name="comment_body" id=""
                                    rows="5" placeholder="{{ __('أضف رداً ...') }} "></textarea>

                                @error('comment_body')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-dark my-2" value="{{ __('رد') }}">
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info mt-5" role="alert">
                            {{ __('يرجي تسجيل الدخول لكي تستطيع وضع رد') }}
                        </div>
                    @endauth
                        @include('comments.all', ['comments' => $comment->replies])
                </div>
            </div>
        </div>
    @endforeach
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $(".reply").hide();
            $(".reply-button").click(function (event) {
                ele = $(this).parents("div.row").nextAll().slice(1,2).slideToggle('slow');
            });
        });
    </script>
@endsection
