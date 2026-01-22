@extends('layouts.user.app')

@section('title', 'Checkout')

@section('content')
	<div class="container py-5">
		<div class="card shadow-lg border-0 rounded-3">
			<div class="card-body text-center p-5">
				<h2 class="text-success mb-3">Order Successfully Created!</h2>
				<p class="mb-4">
					Thank you for shopping at our store.<br>
					Your order has been recorded with <strong>Pending</strong> status.
				</p>
				<div class="alert alert-info text-start">
					<h5>Payment Instructions:</h5>
					<ul class="mb-0">
							<li>Payment Method: <strong>Bank Transfer</strong></li>
							<li>Account Number: <strong>1234567890 (BCA a.n PT Baby Shop)</strong></li>
							<li>Total payment according to order details.</li>
							<li>After transfer, please send proof of payment to admin.</li>
					</ul>
				</div>

				{{-- Form upload bukti pembayaran --}}
				<div class="mt-4 text-start">
					<h5>Upload Payment Proof:</h5>
					<form action="{{ route('checkout.updatePaymentProof', $order->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label for="bukti_pembayaran" class="form-label">Select payment proof file (jpg/png/pdf)</label>
							<input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
							@error('bukti_pembayaran')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
							<button type="submit" class="btn btn-primary">Upload Payment Proof</button>
					</form>
				</div>

				<a href="{{ route('home') }}" class="btn btn-primary mt-4">
					Back to Home
				</a>
			</div>
		</div>
	</div>
@endsection
