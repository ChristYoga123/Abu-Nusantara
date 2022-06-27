@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Edit Pembayaran') }}</h2>
        <div class="col-lg-8">
            <form action="/admin/payments/post/{{ $payment->id }}" method="post">
                @method('put')
                @csrf
                    @if ($payment->payment_name === 'COD')
                        <div class="mb-3">
                            <label for="payment_name" class="form-label">Nama Pembayaran</label>
                            <input type="text" class="form-control @error('payment_name') is-invalid @enderror" id="payment_name" name="payment_name" required autofocus value="{{ old('payment_name', $payment->payment_name) }}" readonly>
                            @error('payment_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="payment_number" class="form-label">Nomor Pembayaran</label>
                            <input type="number" class="form-control" id="payment_number" name="payment_number" required value="{{ old('payment_number', $payment->payment_number) }}">
                        </div>
    
                        <div class="mb-3">
                            <label for="payment-owner" class="form-label">Pemilik</label>
                            <input type="text" class="form-control" id="payment_owner" name="payment_owner" required value="{{ old('payment-owner', $payment->payment_owner) }}">
                        </div>
    
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pemilik</label>
                            <input type="hidden" class="form-control" id="user_id" name="user_id" required value="{{ Auth::user()->id }}">
                        </div>

                    @else
                        <div class="mb-3">
                            <label for="payment_name" class="form-label">Nama Pembayaran</label>
                            <input type="text" class="form-control @error('payment_name') is-invalid @enderror" id="payment_name" name="payment_name" required autofocus value="{{ old('payment_name', $payment->payment_name) }}">
                            @error('[payment_name]')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="payment_number" class="form-label">Nomor Pembayaran</label>
                            <input type="number" class="form-control" id="payment_number" name="payment_number" required value="{{ old('payment_number', $payment->payment_number) }}">
                        </div>

                        <div class="mb-3">
                            <label for="payment-owner" class="form-label">Pemilik</label>
                            <input type="text" class="form-control" id="payment_owner" name="payment_owner" required value="{{ old('payment-owner', $payment->payment_owner) }}">
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pemilik</label>
                            <input type="hidden" class="form-control" id="user_id" name="user_id" required value="{{ Auth::user()->id }}">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-info">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection