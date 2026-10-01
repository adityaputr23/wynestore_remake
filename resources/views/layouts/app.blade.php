<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WYNE STORE // Custom Motorcycle Workshop & Precision Engineering</title>
    <meta name="description" content="High-performance tuning, custom fabrication, lighting kits, and aggressive styling for custom motorcycle enthusiasts.">
    <link rel="stylesheet" href="/css/wynestore.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <script>
        // Disable browser scroll restoration so fresh page loads always start at top
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
    </script>
</head>
<body>
    <div class="app-layout">
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Glassmorphism Navbar + Mobile Sidebar Drawer -->
            @include('partials.navbar')

            {{-- Session Flash Messages (shown at top after login/register/logout) --}}
            @if(session('success') || session('error'))
                <div id="flashMessage" style="position: fixed; top: 90px; left: 50%; transform: translateX(-50%); z-index: 1100; max-width: 480px; width: calc(100vw - 48px);">
                    @if(session('success'))
                        <div style="background: rgba(34,197,94,0.12); border: 1px solid #22c55e; color: #22c55e; padding: 12px 18px; border-radius: 8px; font-size: 13.5px; font-family: var(--font-sub); font-weight: 600; backdrop-filter: blur(12px); box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
                            ✓ {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div style="background: rgba(239,68,68,0.12); border: 1px solid #ef4444; color: #ef4444; padding: 12px 18px; border-radius: 8px; font-size: 13.5px; font-family: var(--font-sub); font-weight: 600; backdrop-filter: blur(12px); box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
                            ✕ {{ session('error') }}
                        </div>
                    @endif
                </div>
                <script>
                    // Auto-dismiss flash message after 4s
                    setTimeout(() => {
                        const el = document.getElementById('flashMessage');
                        if (el) { el.style.transition = 'opacity 0.5s'; el.style.opacity = '0'; setTimeout(() => el.remove(), 500); }
                    }, 4000);
                </script>
            @endif

            <!-- Content Area -->
            <main class="content-body">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer">
                <div>
                    <div class="footer-brand">WYNE STORE</div>
                    <div class="footer-copy">&copy; {{ date('Y') }} WYNE STORE CUSTOMS. BUILT FOR THE BOLD.</div>
                </div>

                {{-- Social Media Links --}}
                <div class="footer-socials">
                    <a href="https://instagram.com/wynestore.id" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="Instagram @wynestore.id">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                        <span>INSTAGRAM</span>
                    </a>
                    <a href="https://tiktok.com/@wynestore.id" target="_blank" rel="noopener noreferrer" class="social-icon-btn" title="TikTok @wynestore.id">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 1 1-5.2-1.74 2.89 2.89 0 0 1 2.31-2.22V8.2a6.34 6.34 0 0 0-5.11 6.2 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V9.4A8.16 8.16 0 0 0 21 10.74V7.28a4.84 4.84 0 0 1-1.41-.59z"/>
                        </svg>
                        <span>TIKTOK</span>
                    </a>
                </div>

                <ul class="footer-links">
                    <li><a href="javascript:void(0)" onclick="openPartsModal()" class="footer-link-item">TERMS</a></li>
                    <li><a href="javascript:void(0)" onclick="openPartsModal()" class="footer-link-item">PRIVACY</a></li>
                    <li><a href="javascript:void(0)" onclick="openPartsModal()" class="footer-link-item">SHIPPING</a></li>
                </ul>
            </footer>
        </div>
    </div>

    <!-- Modals -->
    @include('partials.booking_modal')
    @include('partials.queue_modal')
    @include('partials.motorcycles_modal')
    @include('partials.lighting_modal')
    @include('partials.updates_modal')
    @include('partials.parts_modal')

    <!-- JavaScript Handlers -->
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
        }

        // Booking Modal
        function openBookingModal(serviceId = null) {
            const overlay = document.getElementById('bookingModalOverlay');
            document.getElementById('bookingFormContainer').style.display = 'block';
            document.getElementById('bookingSuccessContainer').style.display = 'none';
            document.getElementById('bookingForm').reset();
            
            if (serviceId) {
                const select = document.getElementById('serviceSelectInput');
                if (select) select.value = serviceId;
            }
            
            overlay.classList.add('active');
        }
        function closeBookingModal() {
            document.getElementById('bookingModalOverlay').classList.remove('active');
        }
        function closeBookingModalOnOutside(e) {
            if (e.target.id === 'bookingModalOverlay') closeBookingModal();
        }

        // Queue Modal
        function openQueueModal() {
            document.getElementById('queueModalOverlay').classList.add('active');
        }
        function closeQueueModal() {
            document.getElementById('queueModalOverlay').classList.remove('active');
        }
        function closeQueueModalOnOutside(e) {
            if (e.target.id === 'queueModalOverlay') closeQueueModal();
        }

        // Motorcycles Modal
        function openMotorcyclesModal() {
            document.getElementById('motorcyclesModalOverlay').classList.add('active');
        }
        function closeMotorcyclesModal() {
            document.getElementById('motorcyclesModalOverlay').classList.remove('active');
        }
        function closeMotorcyclesModalOnOutside(e) {
            if (e.target.id === 'motorcyclesModalOverlay') closeMotorcyclesModal();
        }

        // Lighting Modal
        function openLightingModal() {
            document.getElementById('lightingModalOverlay').classList.add('active');
        }
        function closeLightingModal() {
            document.getElementById('lightingModalOverlay').classList.remove('active');
        }
        function closeLightingModalOnOutside(e) {
            if (e.target.id === 'lightingModalOverlay') closeLightingModal();
        }

        // Updates Modal
        function openUpdatesModal() {
            document.getElementById('updatesModalOverlay').classList.add('active');
        }
        function closeUpdatesModal() {
            document.getElementById('updatesModalOverlay').classList.remove('active');
        }
        function closeUpdatesModalOnOutside(e) {
            if (e.target.id === 'updatesModalOverlay') closeUpdatesModal();
        }

        // Parts Modal
        function openPartsModal() {
            document.getElementById('partsModalOverlay').classList.add('active');
        }
        function closePartsModal() {
            document.getElementById('partsModalOverlay').classList.remove('active');
        }
        function closePartsModalOnOutside(e) {
            if (e.target.id === 'partsModalOverlay') closePartsModal();
        }

        // AJAX Booking Submit
        async function submitBooking(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitBooking');
            const btnText = document.getElementById('btnSubmitText');
            btn.disabled = true;
            btnText.innerText = 'PROCESSING...';

            const form = document.getElementById('bookingForm');
            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('booking.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    document.getElementById('displayBookingCode').innerText = result.booking_code;
                    document.getElementById('bookingFormContainer').style.display = 'none';
                    document.getElementById('bookingSuccessContainer').style.display = 'block';
                } else {
                    alert('Gagal membuat booking: ' + (result.message || 'Terjadi kesalahan.'));
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan koneksi server.');
            } finally {
                btn.disabled = false;
                btnText.innerText = 'CONFIRM BOOKING SLOT';
            }
        }

        // AJAX Track Booking Code
        async function trackBookingCode() {
            const input = document.getElementById('trackCodeInput');
            const resultBox = document.getElementById('trackResultContainer');
            const code = input.value.trim();

            if (!code) {
                alert('Masukkan kode booking (contoh: WYN-8821)');
                return;
            }

            resultBox.style.display = 'block';
            resultBox.innerHTML = '<div style="color: var(--text-muted); text-align: center;">Mencari data booking...</div>';

            try {
                const response = await fetch(`{{ route('booking.track') }}?code=${encodeURIComponent(code)}`);
                const data = await response.json();

                if (data.success) {
                    const b = data.booking;
                    const q = b.queue;
                    resultBox.innerHTML = `
                        <div style="font-family: var(--font-heading); font-size: 24px; color: #ffffff;">BOOKING FOUND: ${b.booking_code}</div>
                        <div style="font-size: 14px; color: var(--accent-gold); margin-bottom: 8px;">${b.customer_name} - ${b.motorcycle_model}</div>
                        <div style="font-size: 13px; color: var(--text-muted);">
                            <div><strong>Service:</strong> ${b.service ? b.service.title : 'N/A'}</div>
                            <div><strong>Status:</strong> <span style="text-transform: uppercase; color: var(--accent-gold);">${b.status}</span></div>
                            <div><strong>Jadwal:</strong> ${b.booking_date} pada ${b.booking_time}</div>
                            ${q ? `<div style="margin-top: 8px; border-top: 1px solid var(--border-color); padding-top: 8px;"><strong>Bay Queue:</strong> ${q.queue_code} (${q.stage} - ${q.progress_percent}%)</div>` : ''}
                        </div>
                    `;
                } else {
                    resultBox.innerHTML = `<div style="color: #ef4444; font-weight: 600;">${data.message}</div>`;
                }
            } catch (err) {
                resultBox.innerHTML = '<div style="color: #ef4444;">Gagal menghubungi server.</div>';
            }
        }
    </script>

    <script>
        // Scroll to top on every fresh page load (prevent browser restoring scroll to #booking)
        window.addEventListener('load', () => {
            if (!window.location.hash) {
                window.scrollTo({ top: 0, behavior: 'instant' });
            }
        });
    </script>
</body>
</html>
