@extends('layouts.app')

@section('content')
<section class="services-section" style="max-width: 720px; margin: 0 auto; width: 100%;">
    <div class="section-header">
        <div>
            <h2 class="section-title">BOOK WORKSHOP SERVICE</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Reserve your build slot at Wyne Store Workshop. Instant registration in MySQL database.
            </p>
        </div>
        <span class="section-subtitle-tag">RESERVATION</span>
    </div>

    <div style="background: var(--bg-card); border: 1px solid var(--border-color); padding: 36px;">
        <form id="standaloneBookingForm" onsubmit="submitStandaloneBooking(event)">
            @csrf
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="customer_name" class="form-input" placeholder="e.g. Aditya Pratama" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Phone / WhatsApp</label>
                    <input type="text" name="customer_phone" class="form-input" placeholder="e.g. 081234567890" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address (Optional)</label>
                    <input type="email" name="customer_email" class="form-input" placeholder="name@domain.com">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Motorcycle Brand & Model</label>
                    <input type="text" name="motorcycle_model" class="form-input" placeholder="e.g. Harley Sportster / Yamaha XSR 155" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Production Year</label>
                    <input type="text" name="motorcycle_year" class="form-input" placeholder="e.g. 2022">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Select Service Package</label>
                <select name="service_id" class="form-select" required>
                    <option value="">-- Choose Workshop Service --</option>
                    @foreach($services as $srv)
                        <option value="{{ $srv->id }}" {{ (isset($selectedServiceId) && $selectedServiceId == $srv->id) ? 'selected' : '' }}>
                            {{ $srv->title }} ({{ $srv->tag }}) - Rp {{ number_format($srv->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Preferred Date</label>
                    <input type="date" name="booking_date" class="form-input" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Preferred Time Slot</label>
                    <select name="booking_time" class="form-select" required>
                        <option value="09:00 AM">09:00 AM - Morning Slot</option>
                        <option value="11:00 AM">11:00 AM - Midday Slot</option>
                        <option value="02:00 PM">02:00 PM - Afternoon Slot</option>
                        <option value="04:00 PM">04:00 PM - Evening Slot</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Custom Specifications / Notes</label>
                <textarea name="notes" class="form-textarea" rows="4" placeholder="Describe any specific custom requests, custom loom requirements, or parts..."></textarea>
            </div>

            <button type="submit" id="btnSubmitPageBooking" class="btn-gold" style="width: 100%; padding: 14px; margin-top: 12px;">
                <span>CONFIRM BOOKING SLOT &rsaquo;</span>
            </button>
        </form>

        <div id="bookingResultSuccess" style="display: none; text-align: center; padding: 20px 0;">
            <div style="font-family: var(--font-heading); font-size: 32px; color: var(--accent-gold); margin-bottom: 8px;">BOOKING CONFIRMED!</div>
            <p style="font-size: 14px; color: var(--text-muted); margin-bottom: 20px;">Your service reservation has been saved into MySQL database.</p>
            <div style="background: #0b0c0f; border: 1px dashed var(--accent-gold); padding: 16px; margin-bottom: 24px;">
                <div style="font-size: 11px; color: var(--text-muted); letter-spacing: 1px;">YOUR BOOKING CODE</div>
                <div id="resultBookingCode" style="font-family: var(--font-heading); font-size: 44px; color: var(--accent-gold);">WYN-0000</div>
            </div>
            <a href="{{ route('workshop.queue') }}" class="btn-gold" style="display: inline-block; padding: 12px 28px; text-decoration: none;">
                VIEW WORKSHOP QUEUE
            </a>
        </div>
    </div>
</section>

<script>
    async function submitStandaloneBooking(e) {
        e.preventDefault();
        const btn = document.getElementById('btnSubmitPageBooking');
        btn.disabled = true;
        btn.innerText = 'PROCESSING...';

        const formData = new FormData(document.getElementById('standaloneBookingForm'));

        try {
            const res = await fetch("{{ route('booking.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            });
            const data = await res.json();
            if (data.success) {
                document.getElementById('standaloneBookingForm').style.display = 'none';
                document.getElementById('bookingResultSuccess').style.display = 'block';
                document.getElementById('resultBookingCode').innerText = data.booking_code;
            } else {
                alert('Gagal: ' + data.message);
            }
        } catch(err) {
            alert('Terjadi kesalahan koneksi.');
        } finally {
            btn.disabled = false;
            btn.innerText = 'CONFIRM BOOKING SLOT ›';
        }
    }
</script>
@endsection
