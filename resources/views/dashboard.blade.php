@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="row">
			<!-- Congratulations Card -->
			<div class="col-lg-12 mb-4 order-0">
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
	</div>
@endsection
