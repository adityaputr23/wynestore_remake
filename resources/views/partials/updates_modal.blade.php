<div class="modal-overlay" id="updatesModalOverlay" onclick="closeUpdatesModalOnOutside(event)">
    <div class="modal-container" style="max-width: 720px;">
        <button type="button" class="modal-close-btn" onclick="closeUpdatesModal()">&times;</button>
        
        <h2 class="modal-title">GARAGE UPDATES & NEWS</h2>
        <p class="modal-subtitle">Latest workshop builds, dyno test results, and garage news.</p>

        <div style="display: flex; flex-direction: column; gap: 20px; margin-top: 20px;">
            @forelse($garageUpdates ?? [] as $up)
                <div style="background: #101217; border: 1px solid var(--border-color); padding: 20px;">
                    <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--text-dim); margin-bottom: 8px;">
                        <span>BY {{ strtoupper($up->author) }}</span>
                        <span>{{ $up->date_str }}</span>
                    </div>
                    <h4 style="font-family: var(--font-heading); font-size: 26px; color: var(--accent-gold); margin-bottom: 8px;">{{ $up->title }}</h4>
                    <p style="font-size: 13.5px; color: var(--text-main); line-height: 1.6; margin-bottom: 10px;">{{ $up->summary }}</p>
                    <div style="font-size: 13px; color: var(--text-muted); line-height: 1.5; border-top: 1px dashed var(--border-color); padding-top: 10px;">
                        {{ $up->content }}
                    </div>
                </div>
            @empty
                <div style="color: var(--text-muted);">No updates published yet.</div>
            @endforelse
        </div>
    </div>
</div>
