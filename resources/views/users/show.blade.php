@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Detail User') }}</h2>

        <h5>Nama: </h5>
        <p>{{ $user->name }}</p>

        <h5>Email: </h5>
        <p>{{ $user->email }}</p>

        <h5>Telepon: </h5>
        <p>{{ $user->phone }}</p>

        <h5>Role: </h5>
        <p>{{ $user->role->role_name }}</p>
    </div>
</div>
@endsection