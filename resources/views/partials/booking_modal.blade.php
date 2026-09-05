<div class="modal-overlay" id="bookingModalOverlay" onclick="closeBookingModalOnOutside(event)">
    <div class="modal-container">
        <button type="button" class="modal-close-btn" onclick="closeBookingModal()">&times;</button>
        
        <div id="bookingFormContainer">
            <h2 class="modal-title">BOOK A SERVICE</h2>
            <p class="modal-subtitle">Reserve a slot at Wyne Store Workshop. Custom builds, lighting, and heavy maintenance.</p>

            <form id="bookingForm" onsubmit="submitBooking(event)">
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
                    <select name="service_id" id="serviceSelectInput" class="form-select" required>
                        <option value="">-- Choose Workshop Service --</option>
                        @foreach($services ?? [] as $srv)
                            <option value="{{ $srv->id }}">
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
                    <textarea name="notes" class="form-textarea" rows="3" placeholder="Describe any specific custom requests, custom loom requirements, or parts..."></textarea>
                </div>

                <button type="submit" id="btnSubmitBooking" class="btn-gold" style="width: 100%; margin-top: 10px; padding: 14px;">
                    <span id="btnSubmitText">CONFIRM BOOKING SLOT</span>
                </button>
            </form>
        </div>

        <div id="bookingSuccessContainer" style="display: none; text-align: center; padding: 20px 0;">
            <div style="width: 60px; height: 60px; background: rgba(242,201,76,0.15); border: 2px solid var(--accent-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="var(--accent-gold)">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="modal-title" style="font-size: 28px;">BOOKING CONFIRMED!</h3>
            <p class="modal-subtitle">Your slot has been registered in the Wyne Store MySQL Database.</p>
            
            <div style="background: #0b0c0f; border: 1px dashed var(--accent-gold); padding: 16px; margin: 20px 0;">
                <div style="font-size: 12px; color: var(--text-muted); letter-spacing: 1px;">YOUR BOOKING TRACKING CODE</div>
                <div id="displayBookingCode" style="font-family: var(--font-heading); font-size: 40px; color: var(--accent-gold); letter-spacing: 2px;">WYN-0000</div>
            </div>

            <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 24px;">Save this tracking code to check your bike's build status in the Workshop Queue anytime.</p>

            <button onclick="closeBookingModal(); openQueueModal();" class="btn-gold" style="width: 100%;">
                VIEW WORKSHOP QUEUE
            </button>
        </div>
    </div>
</div>
