@extends('admin.theme.default')

@section('title')
    {{ __('إضافة مستخدم جديد') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>


                <form method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="row  @cannot('add-user') is-invalid @endcannot">
                        <div class="col">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="{{ __('الاسم') }}" @cannot('add-user') disabled @endcannot>
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="{{ __('البريد الإلكتروني') }}" @cannot('add-user') disabled @endcannot>
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="{{ __('كلمة المرور') }}"
                                @cannot('add-user') disabled @endcannot>
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <select name="role_id" class="form-control" @cannot('add-user') disabled @endcannot>
                                @include('lists.roles', ['id' => null])
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-dark" @cannot('add-user') disabled @endcannot>
                                {{ __('حفظ') }} </button>
                        </div>
                    </div>
                    <span class="invalid-feedback">
                        <strong>{{ __('ليس لديك صلاحية إضافة مستخدمين') }}</strong>
                    </span>
                </form>


            </div>
            <div class="card-body">
                <div class="table-responsive @cannot('edit-user' || 'delete-user') is-invalid @endcannot">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> {{ __('الرقم') }}</th>
                                <th> {{ __('الاسم') }}</th>
                                <th> {{ __('البريد الإلكتروني') }}</th>
                                <th> {{ __('تاريخ التفعيل') }}</th>
                                <th> {{ __('الدور') }}</th>
                                <th> {{ __('تاريخ الإنشاء') }}</th>
                                <th> {{ __('تعديل') }}</th>
                                <th> {{ __('حذف') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at }}</td>
                                    <td>{{ $user->role->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form method="GET" action="{{ route('user.edit', $user->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-link "
                                                style="background-color: white;border: none;"
                                                @cannot('edit-user') disabled @endcannot>
                                                <i class="far fa-edit text-success fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link"
                                                style="background-color: white;border: none;"
                                                @cannot('delete-user') disabled @endcannot>
                                                <i class="far fa-trash-alt text-danger fa-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @cannot('edit-user')
                    <span class="invalid-feedback">
                        <strong>{{ __('ليس لديك صلاحية تعديل مستخدمين') }}</strong>
                    </span>
                @endcannot

                @cannot('delete-user')
                    <span class="invalid-feedback">
                        <strong>{{ __('ليس لديك صلاحية حذف مستخدمين') }}</strong>
                    </span>
                @endcannot


            </div>
        </div>
    </div>
@endsection
