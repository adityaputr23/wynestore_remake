<div class="modal-overlay" id="partsModalOverlay" onclick="closePartsModalOnOutside(event)">
    <div class="modal-container" style="max-width: 780px;">
        <button type="button" class="modal-close-btn" onclick="closePartsModal()">&times;</button>
        
        <h2 class="modal-title">WYNE PARTS & ACCESSORIES SHOP</h2>
        <p class="modal-subtitle">Hand-crafted custom motorcycle parts, CNC components, and performance exhausts.</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
            @foreach($products ?? [] as $part)
                <div style="background: #101217; border: 1px solid var(--border-color); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <span class="service-card-tag" style="margin-bottom: 0;">{{ $part->category }}</span>
                            <span style="font-size: 11px; color: var(--text-muted);">Stock: {{ $part->stock }} pcs</span>
                        </div>
                        <h4 style="font-family: var(--font-heading); font-size: 24px; color: #ffffff; margin-bottom: 6px;">{{ $part->name }}</h4>
                        <p style="font-size: 13px; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">{{ $part->description }}</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-color); padding-top: 12px;">
                        <span style="font-family: var(--font-subheading); font-size: 16px; font-weight: 700; color: var(--accent-gold);">
                            Rp {{ number_format($part->price, 0, ',', '.') }}
                        </span>
                        <a href="https://wa.me/6281298765432?text=Halo%20Wyne%20Store,%20saya%20tertarik%20membeli%20part:%20{{ urlencode($part->name) }}" target="_blank" class="btn-gold" style="padding: 6px 14px; font-size: 12px; text-decoration: none;">
                            BUY / WHATSAPP
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
