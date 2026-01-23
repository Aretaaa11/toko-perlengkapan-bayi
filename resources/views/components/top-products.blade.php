<!-- Top Products Component -->
@props(['topProducts'])

<div class="card">
    <div class="card-header pb-3 border-bottom">
        <h6 class="m-0">Top Products</h6>
    </div>
    <div class="card-body">
        @forelse($topProducts as $index => $product)
            <div class="d-flex align-items-center mb-3 @if(!$loop->last) pb-3 border-bottom @endif">
                <div class="flex-shrink-0 me-3">
                    <div class="badge badge-circle bg-primary">{{ $index + 1 }}</div>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-1">{{ $product->nama }}</h6>
                    <small class="text-muted">{{ $product->kategori->nama ?? 'N/A' }}</small>
                </div>
                <div class="text-end">
                    <h6 class="mb-0">{{ $product->total_sold ?? 0 }} sold</h6>
                    <small class="text-success">Rp {{ number_format($product->harga, 0, ',', '.') }}</small>
                </div>
            </div>
        @empty
            <p class="text-center text-muted py-4">No sales data available</p>
        @endforelse
    </div>
</div>
