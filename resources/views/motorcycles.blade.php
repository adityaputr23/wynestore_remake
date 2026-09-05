@extends('layouts.app')

@section('content')
<section class="services-section">
    <div class="section-header">
        <div>
            <h2 class="section-title">MOTORCYCLES & CUSTOM BUILDS</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Showcase of precision engineered bobbers, cafe racers, and scramblers forged at Wyne Store.
            </p>
        </div>
        <span class="section-subtitle-tag">CUSTOM BUILDS</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 28px;">
        @foreach($motorcycles as $moto)
            <div class="service-card" style="min-height: auto;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span class="service-card-tag" style="margin-bottom: 0;">{{ $moto->category }}</span>
                        <span style="font-size: 11px; color: var(--accent-gold); font-weight: 700;">{{ $moto->status }}</span>
                    </div>
                    <h3 class="service-card-title" style="font-size: 28px;">{{ $moto->name }}</h3>
                    <div style="font-size: 12px; color: var(--accent-gold); margin-bottom: 12px; font-family: var(--font-subheading);">SPECS: {{ $moto->specs }}</div>
                    <p class="service-card-desc">{{ $moto->description }}</p>
                </div>

                <div class="service-card-action" style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-top: 16px;">
                    <span class="service-price" style="font-size: 16px;">Est. Cost: Rp {{ number_format($moto->build_cost, 0, ',', '.') }}</span>
                    <a href="{{ route('booking.create') }}" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        ORDER BUILD
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
