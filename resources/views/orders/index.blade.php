@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Pemesanan') }}</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">{{ __('Tanggal') }}</th>
                    <th class="border-gray-200">{{ __('Pembeli') }}</th>
                    <th class="border-gray-200">{{ __('Status') }}</th>
                    <th class="border-gray-200">{{ __('Total') }}</th>
                    <th class="border-gray-200">{{ __('Aksi') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td><span class="fw-normal">{{ $order->order_date }}</span></td>
                        <td><span class="fw-normal">{{ $order->user->name }}</span></td>
                        <td><span class="fw-normal">{{ $order->order_status }}</span></td>
                        <td><span class="fw-normal">{{ $order->order_total_price }}</span></td>
                        <td>
                            <a href="/admin/roles/post/{{ $order->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div
            class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
