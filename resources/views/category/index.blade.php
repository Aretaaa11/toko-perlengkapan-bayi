@extends('layouts.app')
@section('title', 'Category List')
@section('content')
<div class="container-fluid">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Category' => route('category.index'),
        'Category List' => ''
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
                <h5 class="mb-0">Category List</h5>
                <div class="d-flex align-items-center gap-2">
                    <!-- Search Form -->
                    <form action="{{ route('category.index') }}" method="GET" class="d-flex gap-2 align-items-center" style="width: 350px;">
                        <div class="mb-0 w-100">
                            <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}">
                        </div>
                        <button class="btn btn-primary" type="submit" style="height: 38px; display: flex; align-items: center;">
                            <i class="ti ti-search"></i>
                        </button>
                    </form>
                    <a href="{{ route('category.create') }}" class="btn btn-primary" style="height: 38px; display: flex; align-items: center;">
                        <i class="ti ti-plus me-1"></i> Add Category
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="ps-0">
                                    <p class="fs-3 fw-semibold mb-0">{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3 fw-semibold">{{ $category->nama }}</p>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-md btn-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-md btn-danger"
                                                onclick="deleteConfirm('{{ $category->id }}', '{{ $category->nama }}')">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <p class="text-muted fs-3">No category available</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-3 d-flex justify-content-center">
                {{ $categories->links('pagination::bootstrap-5') }}
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
            text: "Are you sure you want to delete '" + nama + "' category?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FA896B',
            cancelButtonColor: '#49BEFF',
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
