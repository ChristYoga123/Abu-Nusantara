@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Detail Produk') }}</h2>

        <h5>Nama Produk: </h5>
        <p>{{ $product->product_name }}</p>

        <h5>Kategori: </h5>
        <p>{{ $product->productCategory->product_category_name }}</p>

        <h5>Deskripsi: </h5>
        <p>{{ $product->product_description }}</p>

        <h5>Gambar: </h5>
        <p><img src="{{ asset('storage/'.$product->product_image) }}" alt="" width="300px"></p>

        <h5>Harga Awal: </h5>
        <p>Rp{{ $product->product_price }},00</p>

        <h5>Diskon: </h5>
        <p>{{ $product->product_discount_price }} %</p>

        <h5>Harga Total: </h5>
        <p>Rp{{ $product->product_price * (100 - $product->product_discount_price) /100 }},00</p>
        
    </div>
</div>
@endsection