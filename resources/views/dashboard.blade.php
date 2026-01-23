@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="container-xxl flex-grow-1 container-p-y">
		<!-- Welcome Section -->
		<div class="row mb-4">
			<div class="col-lg-12 order-0">
				<div class="card">
					<div class="d-flex align-items-end row">
						<div class="col-sm-7">
							<div class="card-body">
								<h5 class="card-title text-primary">Welcome Admin!</h5>
								<p class="mb-4">
									Have a great day and enjoy your work
								</p>
							</div>
						</div>
						<div class="col-sm-5 text-center text-sm-left">
							<div class="card-body pb-0 px-0 px-md-4">
								<img src="{{ asset('assets/images/backgrounds/welcome-admin.png') }}" width="300" height="auto" alt="Welcome Illustration" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Statistics Cards Section -->
		<div class="row mb-4">
			<x-statistics-card
				icon="fa-shopping-bag"
				title="Products Sold"
				:value="$totalProductsSold"
				color="primary"
				suffix=" products"
			/>

			<x-statistics-card
				icon="fa-money-bill-wave"
				title="Total Revenue"
				:value="$totalRevenue"
				color="success"
			/>

			<x-statistics-card
				icon="fa-boxes"
				title="Total Orders"
				:value="count($recentOrders) > 0 ? \App\Models\Order::count() : 0"
				color="info"
				suffix=" orders"
			/>

			<x-statistics-card
				icon="fa-chart-line"
				title="Average Revenue"
				:value="count($recentOrders) > 0 ? round(\App\Models\Order::avg('total')) : 0"
				color="warning"
			/>
		</div>

		<!-- Order Status Summary -->
		<div class="row mb-4">
			<div class="col-12">
				<x-order-status-summary :orderStats="$orderStats" />
			</div>
		</div>

		<!-- Recent Orders and Top Products -->
		<div class="row">
			<div class="col-lg-8 mb-4">
				<x-recent-orders :recentOrders="$recentOrders" />
			</div>

			<div class="col-lg-4">
				<x-top-products :topProducts="$topProducts" />
			</div>
		</div>
	</div>
@endsection
