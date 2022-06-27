@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Role') }}</h2>

        <h5>Nama: </h5>
        <p>{{ $role->role_name }}</p>

        <h5>Deskripsi: </h5>
        <p>{{ $role->role_description }}</p>
        
    </div>
</div>
@endsection