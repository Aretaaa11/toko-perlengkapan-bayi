@extends('layouts.user.app')

@section('title', $product->nama)

@section('content')
	<section class="py-5">
		<div class="container">
			<div class="row g-5">
				<!-- Product Image -->
				<div class="col-md-5">
					<div class="card shadow-sm">
						<img src="{{ asset('storage/' . $product->foto) }}"
                            class="card-img-top rounded"
                            alt="{{ $product->nama }}">
					</div>
				</div>

				<!-- Product Details -->
				<div class="col-md-7">
					<h2 class="fw-bold">{{ $product->nama }}</h2>
					<h4 class="text-primary fw-bold mb-3">
						Rp {{ number_format($product->harga, 0, ',', '.') }}
					</h4>
					<p>{{ $product->deskripsi }}</p>
					<p class="mt-3">
						<span class="fw-bold">Stock:</span>
						{{ $product->stok > 0 ? $product->stok . ' available' : 'Out of stock' }}
					</p>
					<div class="d-flex gap-2 mt-4">
						<form action="{{ route('cart.add', $product->id) }}" method="POST">
							@csrf
							<button type="submit" class="btn btn-primary btn-md">
							Add to Cart
						</button>
					</form>
					<a href="{{ route('home') }}" class="btn btn-outline-secondary btn-md">Back</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
