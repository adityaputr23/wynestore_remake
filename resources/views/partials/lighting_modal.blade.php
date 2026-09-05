<div class="modal-overlay" id="lightingModalOverlay" onclick="closeLightingModalOnOutside(event)">
    <div class="modal-container" style="max-width: 720px;">
        <button type="button" class="modal-close-btn" onclick="closeLightingModal()">&times;</button>
        
        <h2 class="modal-title">CUSTOM LIGHTING KITS CATALOG</h2>
        <p class="modal-subtitle">Aggressive illumination setups. LEDs, halos, and custom looms built for the bold.</p>

        <div style="display: flex; flex-direction: column; gap: 16px; margin-top: 20px;">
            @foreach(($products ?? collect())->where('category', 'Lighting') as $prod)
                <div style="background: #101217; border: 1px solid var(--border-color); padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="max-width: 70%;">
                        <span class="service-card-tag" style="margin-bottom: 6px;">PLUG & PLAY</span>
                        <h4 style="font-family: var(--font-heading); font-size: 24px; color: #ffffff;">{{ $prod->name }}</h4>
                        <p style="font-size: 13px; color: var(--text-muted); margin-top: 4px;">{{ $prod->description }}</p>
                    </div>
                    <div style="text-align: right;">
                        <div style="font-family: var(--font-subheading); font-size: 18px; font-weight: 700; color: var(--accent-gold); margin-bottom: 8px;">
                            Rp {{ number_format($prod->price, 0, ',', '.') }}
                        </div>
                        <button onclick="closeLightingModal(); openBookingModal(1);" class="btn-gold" style="padding: 8px 16px; font-size: 12px;">
                            BOOK INSTALL
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
