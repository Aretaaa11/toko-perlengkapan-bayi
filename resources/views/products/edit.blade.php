@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container-fluid">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Products' => route('products.index'),
        'Edit Product' => ''
    ]" />
    <div class="row">
        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="ti ti-arrow-back me-1"></i> Back
            </a>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="foto">Thumbnail</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input
                                        type="file"
                                        name="foto"
                                        class="form-control @error('foto') is-invalid @enderror"
                                        id="foto"
                                        aria-describedby="inputGroupFileAddon04"
                                        aria-label="Upload"
                                    />
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if($product->foto)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}" class="img-thumbnail" width="150">
                                        <p class="text-muted mt-1">Current photo</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-package"></i
                                    ></span>
                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        id="nama"
                                        placeholder="Please enter product name"
                                        aria-label="Please enter product name"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ old('nama', $product->nama) }}"
                                    />
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="deskripsi">Description</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"
                                        ><i class="bx bx-comment-detail"></i
                                    ></span>
                                    <textarea
                                        name="deskripsi"
                                        id="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Please enter product description"
                                        aria-label="Please enter product description"
                                        aria-describedby="basic-icon-default-message2"
                                    >{{ old('deskripsi', $product->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="harga">Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"
                                        ><i class="bx bx-dollar-circle"></i
                                    ></span>
                                    <input
                                        type="number"
                                        name="harga"
                                        id="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        placeholder="1000"
                                        aria-label="1000"
                                        aria-describedby="basic-icon-default-phone2"
                                        value="{{ old('harga', $product->harga) }}"
                                        step="0.01"
                                    />
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="stok">Stock</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-stok" class="input-group-text"
                                        ><i class="bx bx-package"></i
                                    ></span>
                                    <input
                                        type="number"
                                        name="stok"
                                        id="stok"
                                        class="form-control @error('stok') is-invalid @enderror"
                                        placeholder="10"
                                        aria-label="10"
                                        aria-describedby="basic-icon-default-stok"
                                        value="{{ old('stok', $product->stok) }}"
                                    />
                                    @error('stok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="kategori_id">Category</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-kategori" class="input-group-text"
                                        ><i class="bx bx-category"></i
                                    ></span>
                                    <select
                                        name="kategori_id"
                                        id="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror"
                                        aria-describedby="basic-icon-default-kategori"
                                    >
                                        <option value="">Choose Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('kategori_id', $product->kategori_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                <i class="ti ti-check me-1"></i>
                                Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
