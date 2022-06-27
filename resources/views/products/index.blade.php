@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Produk') }}</h2>

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('products.index') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Produk" name="cari" value="{{ request('cari') }}" id="cari">
                            <button class="btn btn-outline-info" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-10">
                <a href="/admin/products/post/create" class="btn btn-info w-"><i class="bi bi-plus"></i>  Tambah Produk</a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Nama') }}</th>
                        <th class="border-gray-200">{{ __('Kategori') }}</th>
                        <th class="border-gray-200">{{ __('Gambar') }}</th>
                        <th class="border-gray-200">{{ __('Harga') }}</th>
                        <th class="border-gray-200">{{ __('Aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><span class="fw-normal">{{ $product->product_name }}</span></td>
                            <td><span class="fw-normal">{{ $product->productCategory->product_category_name }}</span></td>
                            <td><span class="fw-normal"><img src="{{ asset('storage/'.$product->product_image) }}" alt="" width="100px"></span></td>
                            <td><span class="fw-normal">{{ $product->product_price * (100 - $product->product_discount_price) / 100 }}</span></td>
                            <td>
                                <a href="/admin/products/post/{{ $product->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                <a href="/admin/products/post/{{ $product->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="/admin/products/post/{{ $product->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $products->links() }}
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