@extends('layouts.app')

@section('content')
<section class="services-section">
    <div class="section-header">
        <div>
            <h2 class="section-title">WORKSHOP SERVICES & ARSENAL</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Explore all precision engineering and fabrication services offered at Wyne Store.
            </p>
        </div>
        <span class="section-subtitle-tag">01 // SERVICES</span>
    </div>

    <div class="services-grid">
        <!-- Card 1: Custom Lighting Kits -->
        <div class="service-card service-card-lighting">
            <div>
                <span class="service-card-tag">ELECTRICAL</span>
                <h3 class="service-card-title">CUSTOM LIGHTING KITS</h3>
                <p class="service-card-desc">
                    Aggressive illumination setups. LEDs, halos, and custom wiring looms built to withstand the elements and command attention.
                </p>
            </div>

            <div class="service-card-action">
                <span class="service-price">Rp 2.500.000</span>
                <a href="{{ route('booking.create', ['service_id' => 1]) }}" class="btn-gold" style="padding: 8px 18px; font-size: 12px; text-decoration: none;">
                    BOOK SERVICE &rsaquo;
                </a>
            </div>
        </div>

        <!-- Card 2: Performance Tuning -->
        <div class="service-card">
            <span class="service-card-number">02</span>
            <div>
                <div class="service-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="service-card-title">PERFORMANCE TUNING</h3>
                <p class="service-card-desc">
                    Dyno-tested calibrations, exhaust system integrations, and raw horsepower extraction.
                </p>
            </div>
            <div class="service-card-action">
                <span class="service-price">Rp 3.500.000</span>
                <a href="{{ route('booking.create', ['service_id' => 2]) }}" class="btn-gold" style="padding: 8px 18px; font-size: 12px; text-decoration: none;">
                    BOOK SERVICE &rsaquo;
                </a>
            </div>
        </div>

        <!-- Card 3: Metal Fabrication -->
        <div class="service-card">
            <span class="service-card-number">03</span>
            <div>
                <div class="service-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    </svg>
                </div>
                <h3 class="service-card-title">METAL FABRICATION</h3>
                <p class="service-card-desc">
                    Custom frames, sissy bars, and structural modifications welded with precision.
                </p>
            </div>
            <div class="service-card-action">
                <span class="service-price">Rp 4.800.000</span>
                <a href="{{ route('booking.create', ['service_id' => 3]) }}" class="btn-gold" style="padding: 8px 18px; font-size: 12px; text-decoration: none;">
                    BOOK SERVICE &rsaquo;
                </a>
            </div>
        </div>

        <!-- Card 4: Heavy Maintenance -->
        <div class="service-card service-card-maintenance">
            <div class="maintenance-content">
                <div>
                    <span class="service-card-tag">ROUTINE</span>
                    <h3 class="service-card-title">HEAVY MAINTENANCE</h3>
                    <p class="service-card-desc">
                        Fluid flushes, brake overhauls, and suspension rebuilds. Keeping the machine running lethal.
                    </p>
                </div>
                <div>
                    <a href="{{ route('booking.create', ['service_id' => 4]) }}" class="link-schedule">
                        VIEW SCHEDULE &rsaquo;
                    </a>
                </div>
            </div>
            <div class="maintenance-img-side"></div>
        </div>
    </div>
</section>
@endsection
