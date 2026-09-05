<div class="modal-overlay" id="queueModalOverlay" onclick="closeQueueModalOnOutside(event)">
    <div class="modal-container" style="max-width: 720px;">
        <button type="button" class="modal-close-btn" onclick="closeQueueModal()">&times;</button>
        
        <h2 class="modal-title">WORKSHOP QUEUE & LIVE TRACKER</h2>
        <p class="modal-subtitle">Track bikes currently undergoing precision engineering in our bays.</p>

        <!-- Search Bar -->
        <div style="display: flex; gap: 10px; margin-bottom: 24px;">
            <input type="text" id="trackCodeInput" class="form-input" placeholder="Enter Booking Code (e.g. WYN-8821)" style="flex-grow: 1;">
            <button onclick="trackBookingCode()" class="btn-gold" style="padding: 10px 20px;">TRACK</button>
        </div>

        <div id="trackResultContainer" style="display: none; margin-bottom: 24px; padding: 16px; background: rgba(242,201,76,0.08); border: 1px solid var(--accent-gold);">
            <!-- Dynamic search result content -->
        </div>

        <div style="font-family: var(--font-subheading); font-size: 13px; font-weight: 700; letter-spacing: 1px; color: var(--text-muted); text-transform: uppercase; margin-bottom: 12px;">
            CURRENT ACTIVE BAYS
        </div>

        <div class="queue-items-grid" id="modalQueueGrid">
            @forelse($queues ?? [] as $q)
                <div class="queue-card-mini">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="queue-bay-badge">{{ $q->queue_code }} // {{ strtoupper($q->status) }}</span>
                        <span style="font-size: 11px; color: var(--text-dim);">Est: {{ $q->estimated_completion }}</span>
                    </div>
                    <div class="queue-bike-name">{{ $q->bike_name }}</div>
                    <div class="queue-stage">Stage: <strong style="color: #ffffff;">{{ $q->stage }}</strong></div>
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" style="width: {{ $q->progress_percent }}%;"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--text-dim); margin-top: 4px;">
                        <span>Lead: {{ $q->mechanic_in_charge }}</span>
                        <span style="color: var(--accent-gold); font-weight: 700;">{{ $q->progress_percent }}%</span>
                    </div>
                </div>
            @empty
                <div style="color: var(--text-muted); font-size: 14px; grid-column: 1 / -1; padding: 20px; text-align: center;">
                    No bikes currently in workshop.
                </div>
            @endforelse
        </div>
    </div>
</div>
