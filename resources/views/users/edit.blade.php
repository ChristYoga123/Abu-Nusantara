@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Edit User') }}</h2>
        <div class="col-lg-8">
            <form action="/admin/users/post/{{ $user->id }}" method="post">
                @method('put')
                @csrf
                    <h5>Nama: </h5>
                    <p>{{ $user->name }}</p>
            
                    <h5>Email: </h5>
                    <p>{{ $user->email }}</p>
            
                    <h5>Telepon: </h5>
                    <p>{{ $user->phone }}</p>

                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-select" name="role_id">
                            @foreach ($roles as $role)
                                @if ($role->id == $user->role_id)
                                    <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                <button type="submit" class="btn btn-info">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection