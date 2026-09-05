<div class="modal-overlay" id="motorcyclesModalOverlay" onclick="closeMotorcyclesModalOnOutside(event)">
    <div class="modal-container" style="max-width: 780px;">
        <button type="button" class="modal-close-btn" onclick="closeMotorcyclesModal()">&times;</button>
        
        <h2 class="modal-title">MOTORCYCLES & CUSTOM BUILDS</h2>
        <p class="modal-subtitle">Precision engineered custom machines forged at Wyne Store.</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; margin-top: 20px;">
            @forelse($motorcycles ?? [] as $moto)
                <div style="background: #101217; border: 1px solid var(--border-color); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <span class="service-card-tag" style="margin-bottom: 0;">{{ $moto->category }}</span>
                            <span style="font-size: 11px; color: var(--accent-gold); font-weight: 700;">{{ $moto->status }}</span>
                        </div>
                        <h4 style="font-family: var(--font-heading); font-size: 26px; color: #ffffff; margin-bottom: 6px;">{{ $moto->name }}</h4>
                        <div style="font-size: 12px; color: var(--accent-gold); margin-bottom: 10px; font-family: var(--font-subheading);">SPECS: {{ $moto->specs }}</div>
                        <p style="font-size: 13px; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">{{ $moto->description }}</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-color); padding-top: 12px;">
                        <span style="font-family: var(--font-subheading); font-size: 14px; font-weight: 700; color: #ffffff;">Est. Cost: Rp {{ number_format($moto->build_cost, 0, ',', '.') }}</span>
                        <button onclick="closeMotorcyclesModal(); openBookingModal();" class="btn-gold" style="padding: 6px 14px; font-size: 12px;">ORDER BUILD</button>
                    </div>
                </div>
            @empty
                <div style="color: var(--text-muted);">No motorcycle builds listed yet.</div>
            @endforelse
        </div>
    </div>
</div>
