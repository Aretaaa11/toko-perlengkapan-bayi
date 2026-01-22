@extends('layouts.user.app')

@section('title', 'Order History')

@section('content')
	<div class="container py-5">
		<h2 class="mb-4">Order History</h2>

		@if($orders->isEmpty())
			<div class="alert alert-info">No orders yet.</div>
		@else
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
					<th>Product Name</th>
					<th>Date</th>
						<th>Total</th>
					<th>Payment Status</th>
					<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $index => $order)
						<tr>
							<td>{{ $index + 1 }}</td>
							<td>{{ $order->product->nama }}</td>
							<td>{{ $order->order->tanggal }}</td>
							<td>Rp {{ $order->order->total }}</td>
							<td>
								@if($order->order->status_pembayaran === 'pending')
									<span class="badge bg-warning text-dark">Pending</span>
								@elseif($order->order->status_pembayaran === 'lunas')
									<span class="badge bg-primary">Paid</span>
								@endif
							</td>
							<td>
								@if($order->order->status_pembayaran === 'pending')
									<a href="{{ route('checkout.sukses') }}" class="btn btn-sm btn-primary">Upload Proof</a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif

		<a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
	</div>
@endsection
