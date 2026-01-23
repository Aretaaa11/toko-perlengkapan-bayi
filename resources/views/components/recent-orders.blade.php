<!-- Recent Orders Component -->
@props(['recentOrders'])

<div class="card">
    <div class="card-header pb-3 border-bottom">
        <h6 class="m-0">Recent Orders</h6>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td><strong>#{{ $order->id }}</strong></td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</td>
                        <td><strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
                        <td>
                            @switch($order->status_pembayaran)
                                @case('pending')
                                    <span class="badge bg-warning">Pending</span>
                                    @break
                                @case('confirmed')
                                    <span class="badge bg-info">Confirmed</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success">Completed</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">{{ $order->status_pembayaran }}</span>
                            @endswitch
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No orders found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
