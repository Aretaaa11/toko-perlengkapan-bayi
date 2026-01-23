<!-- Order Status Summary Component -->
@props(['orderStats'])

<div class="card mb-4">
    <div class="card-header pb-3 border-bottom">
        <h6 class="m-0">Order Status</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded-circle bg-warning-light">
                            <i class="fas fa-hourglass-half text-warning"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Pending</h6>
                        <h5 class="text-warning mb-0">{{ $orderStats['pending'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded-circle bg-info-light">
                            <i class="fas fa-check-circle text-info"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Confirmed</h6>
                        <h5 class="text-info mb-0">{{ $orderStats['confirmed'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded-circle bg-success-light">
                            <i class="fas fa-check-double text-success"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Completed</h6>
                        <h5 class="text-success mb-0">{{ $orderStats['completed'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded-circle bg-danger-light">
                            <i class="fas fa-times-circle text-danger"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Cancelled</h6>
                        <h5 class="text-danger mb-0">{{ $orderStats['cancelled'] ?? 0 }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
