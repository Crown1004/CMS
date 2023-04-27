@extends('admin.theme.default')

@section('title')
    {{ __('التصنيفات') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> {{ __('إضافة التصنيفات') }}
                <form method="post" action="{{ route('category.store') }}">
                    @csrf
                    <div class="row mt-1">
                        <div class="col">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                placeholder="{{ __('التصنيف') }}">
                            @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-dark"> {{ __('حفظ') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> {{ __('الرقم') }}</th>
                                <th> {{ __('التصنيف') }}</th>
                                <th> {{ __('slug') }}</th>
                                <th>{{ __('تاريخ الإنشاء') }}</th>
                                <th> {{ __('حذف') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <form method="post" action="{{ route('category.destroy', $category->id) }}"
                                            onsubmit="return confirm('{{ __('هل أنت متأكد أنك تريد حذف التصنيف هذا؟') }}')">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link"
                                                style="background-color: white;border: none;">
                                                <i class="far fa-trash-alt text-danger fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
