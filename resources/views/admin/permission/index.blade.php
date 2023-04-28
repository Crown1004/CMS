@extends('admin.theme.default')

@section('title')
    {{ __('تعيين الصلاحيات إلى الأدوار') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">

            <form method="post" action="{{ route('permissions') }}">
                @csrf
                <div class="card-header">
                    <div class="col-lg-6 form-group">
                        <label for="role_id"><i class="fa fa-table "></i> {{ __('حدد الدور') }}</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @include('lists.roles')
                        </select>
                    </div>
                </div>
                <div class="card-body row">
                    @foreach ($permissions as $permission)
                        <div class="col-lg-4">
                            <label for="permission">
                                <input type="checkbox" class="" name="permission[]" value="{{ $permission->id }}">
                                {{ $permission->description }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer small text-muted">
                    <input type="submit" class="btn btn-dark" value="حفظ">
                </div>
            </form>
        </div>
    </div>
@endsection

