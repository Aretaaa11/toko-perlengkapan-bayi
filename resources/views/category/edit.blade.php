@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')
<div class="container-fluid">
    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Categories' => route('category.index'),
        'Edit Category' => ''
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
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                                        placeholder="Please enter category name"
                                        aria-label="Please enter category name"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ old('nama', $category->nama) }}"
                                    />
                                    @error('nama')
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
