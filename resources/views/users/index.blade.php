@extends('layouts.app')
@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Users') }}</h2>

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.index') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari User" name="cari" value="{{ request('cari') }}" id="cari">
                            <button class="btn btn-outline-info" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Nama') }}</th>
                        <th class="border-gray-200">{{ __('Email') }}</th>
                        <th class="border-gray-200">{{ __('Role') }}</th>
                        <th class="border-gray-200">{{ __('Aksi') }}</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            @if (Auth::user()->id == $user->id)
                                
                            @else
                                <td><span class="fw-normal">{{ $user->name }}</span></td>
                                <td><span class="fw-normal">{{ $user->email }}</span></td>
                                <td><span class="fw-normal">{{ $user->role->role_name }}</span></td>
                                <td>
                                    <a href="/admin/users/post/{{ $user->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                @can('superadmin')
                                        <a href="/admin/users/post/{{ $user->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/admin/users/post/{{ $user->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                @endcan
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if ($message = Session::get('success'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ $message }}',
            })
        </script>
    @endif
@endsection