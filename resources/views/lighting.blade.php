@extends('layouts.app')

@section('content')
<section class="services-section">
    <div class="section-header">
        <div>
            <h2 class="section-title">CUSTOM LIGHTING KITS</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                High-intensity projector headlights, RGB halo loops, and weatherproof wiring looms.
            </p>
        </div>
        <span class="section-subtitle-tag">ELECTRICAL // LIGHTING</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
        @foreach($lightingProducts as $lp)
            <div class="service-card">
                <div>
                    <span class="service-card-tag">PLUG & PLAY</span>
                    <h3 class="service-card-title" style="font-size: 28px;">{{ $lp->name }}</h3>
                    <p class="service-card-desc">{{ $lp->description }}</p>
                </div>
                <div class="service-card-action" style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-top: 16px;">
                    <span class="service-price" style="font-size: 18px;">Rp {{ number_format($lp->price, 0, ',', '.') }}</span>
                    <a href="{{ route('booking.create', ['service_id' => 1]) }}" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        BOOK INSTALLATION
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
