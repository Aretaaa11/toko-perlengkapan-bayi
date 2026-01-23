<!-- Statistics Card Component -->
@props(['icon' => '', 'title' => '', 'value' => 0, 'color' => 'primary', 'suffix' => ''])

<div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-muted mb-1">{{ $title }}</h6>
                    <h4 class="text-{{ $color }} mb-0">
                        @if(is_numeric($value))
                            @if($title === 'Total Revenue' || $title === 'Average Revenue')
                                Rp {{ number_format($value, 0, ',', '.') }}
                            @else
                                {{ number_format($value, 0, ',', '.') }}{{ $suffix }}
                            @endif
                        @else
                            {{ $value }}{{ $suffix }}
                        @endif
                    </h4>
                </div>
                <div class="avatar flex-shrink-0">
                    <span class="avatar-initial rounded bg-{{ $color }}-light">
                        <i class="fas {{ $icon }}"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
