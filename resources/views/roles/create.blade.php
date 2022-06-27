@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Tambah Role') }}</h2>
        <div class="col-lg-8">
            <form action="/admin/roles/post" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="role_name" class="form-label">Nama Role</label>
                        <input type="text" class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name" required autofocus value="{{ old('role_name') }}">
                        @error('role_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role_description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="role_description" name="role_description" required value="{{ old('role_description') }}">
                    </div>
                    <button type="submit" class="btn btn-info">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection