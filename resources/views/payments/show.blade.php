@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Detail Kategori Produk') }}</h2>

        <h5>Nama Pembayaran: </h5>
        <p>{{ $payment->payment_name }}</p>

        <h5>Nomor Rekening: </h5>
        <p>{{ $payment->payment_number }}</p>

        <h5>Pemilik: </h5>
        <p>{{ $payment->payment_owner }}</p>

        
    </div>
</div>
@endsection