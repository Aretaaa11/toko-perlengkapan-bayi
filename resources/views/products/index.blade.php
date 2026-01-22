@extends('layouts.app')
@section('title', 'Product List')
@section('content')
<div class="container-fluid">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Product' => route('products.index'),
        'Product List' => ''
    ]" />
    @if(session('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Responsive Table -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Product List</h5>
                <div class="d-flex align-items-center gap-2">
                    <!-- Search Form -->
                    <form action="{{ route('products.index') }}" method="GET" class="d-flex gap-2 align-items-center" style="width: 350px;">
                        <div class="mb-0 w-100">
                            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
                        </div>
                        <button class="btn btn-primary" type="submit" style="height: 38px; display: flex; align-items: center;">
                            <i class="ti ti-search"></i>
                        </button>
                    </form>
                    <a href="{{ route('products.create') }}" class="btn btn-primary" style="height: 38px; display: flex; align-items: center;">
                        <i class="ti ti-plus me-1"></i> Add Product
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-muted fw-semibold">
                            <th scope="col" class="ps-0">No</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @forelse ($products as $product)
                            <tr>
                                <td class="ps-0">
                                    <p class="fs-3 fw-semibold mb-0">{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</p>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($product->foto)
                                            <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}" class="rounded-circle" width="40" height="40">
                                        @else
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="No Image" class="rounded-circle" width="40" height="40">
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3 fw-semibold">{{ $product->nama }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3">{{ $product->kategori->nama ?? '-' }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3 text-muted">{{ Str::limit($product->deskripsi, 30) }}</p>
                                </td>
                                <td>
                                    <p class="fs-3 text-dark fw-semibold mb-0">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <span class="badge fw-semibold py-1 @if($product->stok > 10) bg-success-subtle text-success @elseif($product->stok > 5) bg-warning-subtle text-warning @else bg-danger-subtle text-danger @endif">{{ $product->stok }}</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-md btn-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-md btn-danger"
                                                onclick="deleteConfirm('{{ $product->id }}', '{{ $product->nama }}')">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <p class="text-muted fs-3">No products available</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-3 d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .swal2-popup {
        font-size: 0.875rem;
    }
    .swal2-title {
        font-size: 1.25rem;
    }
    .swal2-html-container {
        font-size: 0.875rem;
    }
    .swal2-confirm, .swal2-cancel {
        font-size: 0.875rem;
        padding: 0.5rem 1.5rem !important;
        border-radius: 7px !important;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .swal2-confirm {
        background-color: #FA896B !important;
    }
    .swal2-confirm:hover {
        background-color: #E86D47 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(250, 137, 107, 0.3);
    }
    .swal2-cancel {
        background-color: #49BEFF !important;
    }
    .swal2-cancel:hover {
        background-color: #2BA0E6 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(73, 190, 255, 0.3);
    }
</style>
<script>
    function deleteConfirm(id, nama) {
        Swal.fire({
            title: 'Warning',
            text: "Are you sure you want to delete '" + nama + "' product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Delete!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush
