@extends('layouts.app')

@section('content')

<!-- 1. HERO SECTION (#home) -->
<section class="hero-section" id="home">
    <div class="hero-content">
        <div class="hero-badge">EST. 2024 // BUILT FOR THE BOLD</div>
        <h1 class="hero-title">
            RAW POWER.
            <span class="highlight-gold">PRECISION</span>
            ENGINEERING.
        </h1>
        <p class="hero-desc">
            We don't just fix bikes. We forge them. High-performance tuning, custom fabrication, and aggressive styling for those who demand more from the machine.
        </p>
        <div class="hero-cta">
            <a href="#booking" class="btn-gold">BUILD YOURS</a>
            <a href="#queue" class="btn-outline">VIEW GARAGE</a>
        </div>
    </div>

    <div class="hero-poster-wrapper">
        <div class="hero-poster-card">
            <img src="{{ asset('images/wyne_store.jpg') }}" alt="Wyne Store Artwork Poster" class="hero-poster-img">
        </div>
    </div>
</section>

<!-- 2. OUR ARSENAL SERVICES SECTION (#services) -->
<section class="services-section" id="services">
    <div class="section-header">
        <div>
            <h2 class="section-title">OUR ARSENAL</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Precision custom motorcycle modifications, performance extraction, and heavy maintenance.
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
                <a href="#booking" onclick="preselectService(1)" class="btn-arrow-square" title="Book Custom Lighting Kits">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
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
                <a href="#booking" onclick="preselectService(2)" class="btn-gold" style="padding: 8px 18px; font-size: 12px; text-decoration: none;">
                    BOOK SERVICE
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
                <a href="#booking" onclick="preselectService(3)" class="btn-gold" style="padding: 8px 18px; font-size: 12px; text-decoration: none;">
                    BOOK SERVICE
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
                    <a href="#booking" onclick="preselectService(4)" class="link-schedule">
                        BOOK SCHEDULE &rsaquo;
                    </a>
                </div>
            </div>
            <div class="maintenance-img-side"></div>
        </div>
    </div>
</section>

<!-- 3. INVENTORY & PARTS CATALOG SECTION (#inventory) -->
<section class="services-section" id="inventory">
    <div class="section-header">
        <div>
            <h2 class="section-title">PARTS & ACCESSORIES INVENTORY</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Hand-crafted custom motorcycle components, CNC parts, and high-performance exhausts.
            </p>
        </div>
        <span class="section-subtitle-tag">02 // INVENTORY CATALOG</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr)); gap: 24px;">
        @foreach($products as $product)
            <div class="service-card" style="min-height: auto;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 8px;">
                        <span class="service-card-tag" style="margin-bottom: 0;">{{ $product->category }}</span>
                        <span style="font-size: 11px; color: var(--accent-gold); font-weight: 700;">Stock: {{ $product->stock }} pcs</span>
                    </div>
                    <h3 class="service-card-title" style="font-size: 26px;">{{ $product->name }}</h3>
                    <p class="service-card-desc">{{ $product->description }}</p>
                </div>

                <div class="service-card-action" style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-top: 16px; flex-wrap: wrap; gap: 10px;">
                    <span class="service-price" style="font-size: 18px;">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <a href="https://wa.me/6281298765432?text=Halo%20Wyne%20Store,%20saya%20tertarik%20membeli%20part:%20{{ urlencode($product->name) }}" target="_blank" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        ORDER VIA WHATSAPP
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- 4. CUSTOM LIGHTING KITS SECTION (#lighting) -->
<section class="services-section" id="lighting">
    <div class="section-header">
        <div>
            <h2 class="section-title">CUSTOM LIGHTING KITS</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                High-intensity projector headlights, RGB halo loops, and weatherproof wiring looms.
            </p>
        </div>
        <span class="section-subtitle-tag">03 // ELECTRICAL LIGHTING</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr)); gap: 24px;">
        @foreach($lightingProducts as $lp)
            <div class="service-card" style="min-height: auto;">
                <div>
                    <span class="service-card-tag">PLUG & PLAY</span>
                    <h3 class="service-card-title" style="font-size: 26px;">{{ $lp->name }}</h3>
                    <p class="service-card-desc">{{ $lp->description }}</p>
                </div>
                <div class="service-card-action" style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-top: 16px; flex-wrap: wrap; gap: 10px;">
                    <span class="service-price" style="font-size: 18px;">Rp {{ number_format($lp->price, 0, ',', '.') }}</span>
                    <a href="#booking" onclick="preselectService(1)" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        BOOK INSTALLATION
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- 5. MOTORCYCLES & CUSTOM BUILDS SECTION (#motorcycles) -->
<section class="services-section" id="motorcycles">
    <div class="section-header">
        <div>
            <h2 class="section-title">MOTORCYCLES & CUSTOM BUILDS</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Showcase of precision engineered bobbers, cafe racers, and scramblers forged at Wyne Store.
            </p>
        </div>
        <span class="section-subtitle-tag">04 // CUSTOM BUILDS</span>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr)); gap: 24px;">
        @foreach($motorcycles as $moto)
            <div class="service-card" style="min-height: auto;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <span class="service-card-tag" style="margin-bottom: 0;">{{ $moto->category }}</span>
                        <span style="font-size: 11px; color: var(--accent-gold); font-weight: 700;">{{ $moto->status }}</span>
                    </div>
                    <h3 class="service-card-title" style="font-size: 28px;">{{ $moto->name }}</h3>
                    <div style="font-size: 12px; color: var(--accent-gold); margin-bottom: 12px; font-family: var(--font-sub);">SPECS: {{ $moto->specs }}</div>
                    <p class="service-card-desc">{{ $moto->description }}</p>
                </div>

                <div class="service-card-action" style="border-top: 1px solid var(--border-color); padding-top: 16px; margin-top: 16px;">
                    <span class="service-price" style="font-size: 16px;">Est: Rp {{ number_format($moto->build_cost, 0, ',', '.') }}</span>
                    <a href="#booking" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        ORDER BUILD
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- 6. WORKSHOP QUEUE & LIVE TRACKER SECTION (#queue) -->
<section class="services-section" id="queue">
    <div class="section-header">
        <div>
            <h2 class="section-title">WORKSHOP QUEUE & LIVE TRACKER</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Currently servicing <strong style="color: var(--accent-gold);">{{ $activeInShop }} bikes</strong> in workshop bays. Real-time status updates.
            </p>
        </div>
        <span class="section-subtitle-tag">05 // LIVE WORKSHOP</span>
    </div>

    <!-- Search Booking Code Box -->
    <div style="background: var(--glass-bg); border: 1px solid var(--border-color); padding: 24px; margin-bottom: 24px; border-radius: 4px;">
        <div style="font-family: var(--font-sub); font-size: 11px; font-weight: 700; color: var(--text-muted); letter-spacing: 1px; margin-bottom: 10px; text-transform: uppercase;">
            TRACK YOUR BOOKING STATUS
        </div>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <input type="text" id="trackCodeInputMain" class="form-input" placeholder="Enter Booking Code (e.g. WYN-8821)" style="flex: 1; min-width: 220px;">
            <button onclick="trackCodeOnMain()" class="btn-gold" style="padding: 10px 24px;">TRACK STATUS</button>
        </div>
        <div id="mainTrackResult" style="display: none; margin-top: 16px; padding: 16px; background: rgba(245, 214, 152, 0.08); border: 1px solid var(--accent-gold); border-radius: 4px;"></div>
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

<!-- 7. GARAGE UPDATES & NEWS SECTION (#updates) -->
<section class="services-section" id="updates">
    <div class="section-header">
        <div>
            <h2 class="section-title">GARAGE UPDATES & NEWS</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Latest workshop builds, dyno calibrations, and shop announcements.
            </p>
        </div>
        <span class="section-subtitle-tag">06 // NEWS & UPDATES</span>
    </div>

    <div style="display: flex; flex-direction: column; gap: 24px;">
        @foreach($garageUpdates as $update)
            <div class="service-card" style="min-height: auto; padding: 32px;">
                <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--text-dim); margin-bottom: 8px;">
                    <span>BY {{ strtoupper($update->author) }}</span>
                    <span>{{ $update->date_str }}</span>
                </div>
                <h3 class="service-card-title" style="font-size: 30px; color: var(--accent-gold);">{{ $update->title }}</h3>
                <p style="font-size: 15px; color: var(--text-main); line-height: 1.6; margin-bottom: 12px; font-weight: 500;">
                    {{ $update->summary }}
                </p>
                <div style="font-size: 14px; color: var(--text-muted); line-height: 1.6; border-top: 1px dashed var(--border-color); padding-top: 16px;">
                    {{ $update->content }}
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- 8. BOOK WORKSHOP SERVICE SECTION (#booking) -->
<section class="services-section" id="booking" style="max-width: 760px; margin: 0 auto; width: 100%;">
    <div class="section-header">
        <div>
            <h2 class="section-title">BOOK WORKSHOP SERVICE</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Reserve your build slot at Wyne Store Workshop. Instant registration in MySQL database.
            </p>
        </div>
        <span class="section-subtitle-tag">07 // RESERVATION</span>
    </div>

    <div style="background: var(--glass-bg); border: 1px solid var(--border-color); padding: 36px; border-radius: 4px;">
        <form id="mainPageBookingForm" onsubmit="submitMainBooking(event)">
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
                <select name="service_id" id="mainServiceSelect" class="form-select" required>
                    <option value="">-- Choose Workshop Service --</option>
                    @foreach($services as $srv)
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
                <textarea name="notes" class="form-textarea" rows="4" placeholder="Describe any specific custom requests, custom loom requirements, or parts..."></textarea>
            </div>

            <button type="submit" id="btnMainBooking" class="btn-gold" style="width: 100%; padding: 14px; margin-top: 12px;">
                <span>CONFIRM BOOKING SLOT &rsaquo;</span>
            </button>
        </form>

        <div id="mainBookingSuccess" style="display: none; text-align: center; padding: 20px 0;">
            <div style="font-family: var(--font-heading); font-size: 32px; color: var(--accent-gold); margin-bottom: 8px;">BOOKING CONFIRMED!</div>
            <p style="font-size: 14px; color: var(--text-muted); margin-bottom: 20px;">Your service reservation has been saved into MySQL database.</p>
            <div style="background: #0b0c0f; border: 1px dashed var(--accent-gold); padding: 16px; margin-bottom: 24px;">
                <div style="font-size: 11px; color: var(--text-muted); letter-spacing: 1px;">YOUR BOOKING CODE</div>
                <div id="mainBookingCodeDisplay" style="font-family: var(--font-heading); font-size: 44px; color: var(--accent-gold);">WYN-0000</div>
            </div>
            <a href="#queue" class="btn-gold" style="display: inline-block; padding: 12px 28px; text-decoration: none;">
                VIEW WORKSHOP QUEUE
            </a>
        </div>
    </div>
</section>

<script>
    function preselectService(id) {
        const select = document.getElementById('mainServiceSelect');
        if (select) select.value = id;
    }

    async function trackCodeOnMain() {
        const code = document.getElementById('trackCodeInputMain').value.trim();
        const box = document.getElementById('mainTrackResult');
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

    async function submitMainBooking(e) {
        e.preventDefault();
        const btn = document.getElementById('btnMainBooking');
        btn.disabled = true;
        btn.innerText = 'PROCESSING...';

        const formData = new FormData(document.getElementById('mainPageBookingForm'));

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
                document.getElementById('mainPageBookingForm').style.display = 'none';
                document.getElementById('mainBookingSuccess').style.display = 'block';
                document.getElementById('mainBookingCodeDisplay').innerText = data.booking_code;
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
