@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Pembayaran') }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('payments.index') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Pembayaran" name="cari" value="{{ request('cari') }}" id="cari">
                            <button class="btn btn-outline-info" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-10">
                <a href="/admin/payments/post/create" class="btn btn-info w-"><i class="bi bi-plus"></i>  Tambah Pembayaran</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Nama') }}</th>
                        <th class="border-gray-200">{{ __('Pemilik') }}</th>
                        <th class="border-gray-200">{{ __('Aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr id="result">
                            @if (Auth::user()->id == $payment->user_id)
                                <td><span class="fw-normal">{{ $payment->payment_name }}</span></td>
                                <td><span class="fw-normal">{{ $payment->payment_owner }}</span></td>
                                <td>
                                    <a href="/admin/payments/post/{{ $payment->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                    <a href="/admin/payments/post/{{ $payment->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="/admin/payments/post/{{ $payment->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            @elseif($payment->payment_name === 'COD')
                                <td><span class="fw-normal">{{ $payment->payment_name }}</span></td>
                                <td><span class="fw-normal">{{ $payment->payment_owner }}</span></td>
                                <td>
                                    <a href="/admin/payments/post/{{ $payment->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                    <a href="/admin/payments/post/{{ $payment->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="/admin/payments/post/{{ $payment->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-end">
                {{ $payments->links() }}
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