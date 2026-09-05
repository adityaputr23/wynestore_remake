@extends('layouts.app')

@section('content')
<section class="services-section">
    <div class="section-header">
        <div>
            <h2 class="section-title">PARTS & ACCESSORIES INVENTORY</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Hand-crafted custom motorcycle components, CNC parts, and high-performance exhausts.
            </p>
        </div>
        <span class="section-subtitle-tag">INVENTORY CATALOG</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
        @foreach($products as $product)
            <div class="service-card" style="min-height: auto;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span class="service-card-tag" style="margin-bottom: 0;">{{ $product->category }}</span>
                        <span style="font-size: 11px; color: var(--accent-gold); font-weight: 700;">In Stock ({{ $product->stock }} pcs)</span>
                    </div>
                    <h3 class="service-card-title" style="font-size: 28px;">{{ $product->name }}</h3>
                    <p class="service-card-desc">{{ $product->description }}</p>
                </div>

                <div class="service-card-action" style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-top: 16px;">
                    <span class="service-price" style="font-size: 18px;">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <a href="https://wa.me/6281298765432?text=Halo%20Wyne%20Store,%20saya%20tertarik%20membeli%20part:%20{{ urlencode($product->name) }}" target="_blank" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        ORDER VIA WHATSAPP
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
