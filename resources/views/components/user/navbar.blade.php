<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
	<div class="container">
		<a class="navbar-brand" href="#">
			<img src="/assets/images/logos/logo-title.png" alt="Toko Perlengkapan Bayi" width="150" height="auto" class="img-fluid">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link active" href="/">Home</a>
				</li>
				@auth
					<li class="nav-item">
						<a class="nav-link" href="{{ route('cart.index') }}">Checkout</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('orders.history')}}">Order History</a>
					</li>
				@endauth
			</ul>
			@guest
				<a href="{{ route('login') }}" class="btn btn-primary ms-lg-3">Login</a>
			@endguest
			@auth
				<form method="POST" action="{{ route('logout') }}" class="d-inline">
					@csrf
					<button type="submit" class="btn btn-danger ms-lg-3">Logout</button>
				</form>
			@endauth
		</div>
	</div>
</nav>
