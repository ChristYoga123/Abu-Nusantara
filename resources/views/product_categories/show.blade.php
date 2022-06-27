@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Detail Kategori Produk') }}</h2>

        <h5>Nama Kategori: </h5>
        <p>{{ $product_category->product_category_name }}</p>

        <h5>Deskripsi: </h5>
        <p>{{ $product_category->product_category_description }}</p>
        
    </div>
</div>
@endsection