@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Edit Kategori Produk') }}</h2>
        <div class="col-lg-8">
            <form action="/admin/product_categories/post/{{ $product_category->id }}" method="post">
                @method('put')
                @csrf
                    <div class="mb-3">
                        <label for="product_category_name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('product_category_name') is-invalid @enderror" id="product_category_name" name="product_category_name" required autofocus value="{{ old('product_category_name', $product_category->product_category_name) }}">
                        @error('product_category_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="product_category_description" class="form-label">Deskripsi Kategori</label>
                        <input type="text" class="form-control @error('product_category_description') is-invalid @enderror" id="product_category_description" name="product_category_description" required autofocus value="{{ old('product_category_description', $product_category->product_category_description) }}">
                    </div>
                <button type="submit" class="btn btn-info">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection