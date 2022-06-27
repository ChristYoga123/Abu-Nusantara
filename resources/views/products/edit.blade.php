@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Edit Produk') }}</h2>
        <div class="col-lg-8">
            <form action="/admin/products/post/{{ $product->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" required autofocus value="{{ old('product_name', $product->product_name) }}">
                        @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="product_slug" class="form-label">Slug Produk</label>
                        <input type="text" class="form-control" id="product_slug" name="product_slug" required value="{{ old('product_slug', $product->product_slug) }}" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_description" class="form-label @error('product_image') is-invalid @enderror">Deskripsi</label>
                        <input type="text" class="form-control" id="product_description" name="product_description" required value="{{ old('product_description', $product->product_description) }}">
                        @error('product_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_category_id" class="form-label">Kategori Produk</label>
                        <select class="form-select" name="product_category_id" id="product_category_id">
                            @foreach ($product_categories as $product_category)
                                @if ($product_category->id == $product->product_category_id)
                                    <option value="{{ $product_category->id }}" selected>{{ $product_category->product_category_name }}</option>
                                @else
                                    <option value="{{ $product_category->id }}">{{ $product_category->product_category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product_image" class="form-label">Gambar Produk</label>
                        <input type="hidden" name="product_old_image" value="{{ old($product->product_image) }}">
                        @if ($product->product_image)
                            <img src="{{ asset('storage/'.$product->product_image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                        @endif
                        <input class="form-control @error('product_image') is-invalod @enderror" type="file" id="product_image" name="product_image" onchange="previewImage()">
                        <div class="my-2">
                            <p class="fs-6">Ukuran maksimum: 2048 KB</p>
                            <p class="fs-6">File: jpg, jpeg, png</p>
                        </div>
                        @error('product_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="product_price" class="form-label">Harga Produk</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('product_price') is-invalid @enderror" name="product_price" id="product_price" required value="{{ old('product_price', $product->product_price) }}">
                            <span class="input-group-text">,00</span>
                        </div>
                        @error('product_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_discount_price" class="form-label">Diskon Produk</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Disc.</span>
                            <input type="number" class="form-control @error('product_discount_price') is-invalid @enderror" name="product_discount_price" id="product_price" value="{{ old('product_discount_price', $product->product_discount_price) }}">
                            <span class="input-group-text">%</span>
                        </div>
                        @error('product_discount_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info">Edit</button>
            </form>
        </div>
    </div>
</div>

<script>
    const product_name = document.querySelector('#product_name');
    const product_slug = document.querySelector('#product_slug');

    product_name.addEventListener('keyup', function(e) {
        product_slug.value = e.target.value.toLowerCase().replace(/ /g, '-');
    });

    function previewImage() {
        const product_image = document.querySelector('#product_image');
        const product_image_preview = document.querySelector('.img-preview');

        product_image_preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(product_image.files[0]);

        oFReader.onload = function(oFREvent) {
            product_image_preview.src = oFREvent.target.result;
        };
    }
</script>
@endsection