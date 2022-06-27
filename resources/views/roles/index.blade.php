@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Roles') }}</h2>
            <div class="col-lg-10">
                <a href="/admin/roles/post/create" class="btn btn-info w-"><i class="bi bi-plus"></i>  Tambah Role</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Nama') }}</th>
                        <th class="border-gray-200">{{ __('Deskripsi') }}</th>
                        <th class="border-gray-200">{{ __('Aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td><span class="fw-normal">{{ $role->role_name }}</span></td>
                            <td><span class="fw-normal">{{ $role->role_description }}</span></td>
                            <td>
                                <a href="/admin/roles/post/{{ $role->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                <a href="/admin/roles/post/{{ $role->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/admin/roles/post/{{ $role->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $roles->links() }}
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