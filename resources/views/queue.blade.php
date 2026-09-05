@extends('layouts.app')

@section('content')
<section class="services-section">
    <div class="section-header">
        <div>
            <h2 class="section-title">WORKSHOP QUEUE & LIVE TRACKER</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Real-time tracking of bikes undergoing precision engineering in our bays.
            </p>
        </div>
        <span class="section-subtitle-tag">LIVE WORKSHOP</span>
    </div>

    <!-- Search Code Box -->
    <div style="background: var(--bg-card); border: 1px solid var(--border-color); padding: 24px; margin-bottom: 24px;">
        <div style="font-family: var(--font-subheading); font-size: 12px; font-weight: 700; color: var(--text-muted); letter-spacing: 1px; margin-bottom: 10px; text-transform: uppercase;">
            TRACK YOUR BOOKING STATUS
        </div>
        <div style="display: flex; gap: 12px;">
            <input type="text" id="trackCodeInputPage" class="form-input" placeholder="Enter Booking Code (e.g. WYN-8821)" style="flex-grow: 1;">
            <button onclick="trackCodeOnPage()" class="btn-gold" style="padding: 10px 24px;">TRACK STATUS</button>
        </div>
        <div id="pageTrackResult" style="display: none; margin-top: 16px; padding: 16px; background: rgba(245, 214, 152, 0.08); border: 1px solid var(--accent-gold);"></div>
    </div>

    <div class="queue-items-grid">
        @foreach($queues as $q)
            <div class="queue-card-mini" style="padding: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <span class="queue-bay-badge">{{ $q->queue_code }} // {{ strtoupper($q->status) }}</span>
                    <span style="font-size: 11px; color: var(--text-dim);">Est: {{ $q->estimated_completion }}</span>
                </div>
                <div class="queue-bike-name" style="font-size: 18px; margin-bottom: 4px;">{{ $q->bike_name }}</div>
                <div class="queue-stage" style="margin-bottom: 12px;">Stage: <strong style="color: #ffffff;">{{ $q->stage }}</strong></div>
                <div class="progress-bar-bg" style="height: 8px; margin-bottom: 8px;">
                    <div class="progress-bar-fill" style="width: {{ $q->progress_percent }}%;"></div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 12px; color: var(--text-dim);">
                    <span>Lead: {{ $q->mechanic_in_charge }}</span>
                    <span style="color: var(--accent-gold); font-weight: 700;">{{ $q->progress_percent }}%</span>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
    async function trackCodeOnPage() {
        const code = document.getElementById('trackCodeInputPage').value.trim();
        const box = document.getElementById('pageTrackResult');
        if (!code) { alert('Masukkan kode booking!'); return; }
        box.style.display = 'block';
        box.innerHTML = 'Mencari status...';
        try {
            const res = await fetch(`{{ route('booking.track') }}?code=${encodeURIComponent(code)}`);
            const data = await res.json();
            if (data.success) {
                const b = data.booking;
                box.innerHTML = `
                    <div style="font-family: var(--font-heading); font-size: 24px; color: #ffffff;">STATUS BOOKING: ${b.booking_code}</div>
                    <div style="color: var(--accent-gold); font-size: 15px; margin-bottom: 6px;">${b.customer_name} - ${b.motorcycle_model}</div>
                    <div>Status: <strong style="color: var(--accent-gold); text-transform: uppercase;">${b.status}</strong> | Tanggal: ${b.booking_date} (${b.booking_time})</div>
                `;
            } else {
                box.innerHTML = `<span style="color: #ef4444;">${data.message}</span>`;
            }
        } catch(e) {
            box.innerHTML = '<span style="color: #ef4444;">Gagal menghubungi server.</span>';
        }
    }
</script>
@endsection
