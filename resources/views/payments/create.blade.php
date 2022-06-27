@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Tambah Kategori') }}</h2>
        <div class="col-lg-8">
            <form action="/admin/payments/post" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="payment_name" class="form-label">Nama Pembayaran</label>
                        <input type="text" class="form-control @error('payment_name') is-invalid @enderror" id="payment_name" name="payment_name" required autofocus value="{{ old('payment_name') }}">
                        @error('[payment_name]')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="payment_number" class="form-label">Nomor Pembayaran</label>
                        <input type="number" class="form-control" id="payment_number" name="payment_number" required value="{{ old('payment_number') }}">
                    </div>

                    <div class="mb-3">
                        <label for="payment-owner" class="form-label">Pemilik</label>
                        <input type="text" class="form-control" id="payment_owner" name="payment_owner" required value="{{ old('payment-owner') }}">
                    </div>

                    <div class="mb-3">
                        {{-- input hidden tetapi valuenya adalah id user yang sedang login --}}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>

                    <button type="submit" class="btn btn-info">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection