<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WYNE STORE // Admin Management Dashboard</title>
    <meta name="description" content="Workshop Control Panel & Admin Management for Wyne Store.">
    <link rel="stylesheet" href="{{ asset('css/wynestore.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
    <div class="app-layout">
        <div class="main-wrapper">
            
            {{-- DEDICATED ADMIN FLOATING CAPSULE NAVBAR --}}
            <div class="floating-navbar-container">
                <nav class="floating-navbar">
                    {{-- Left: Circle Badge Logo & Admin Badge --}}
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <a href="{{ route('admin.dashboard') }}" class="nav-logo-badge" title="WYNE STORE - Admin Dashboard">
                            <img src="{{ asset('images/wyne_store_logo.jpg') }}" alt="WYNE STORE Logo">
                        </a>

                        <a href="{{ route('admin.dashboard') }}" class="wyne-brand-link" style="text-decoration: none; display: flex; align-items: center; gap: 8px;">
                            <span class="wyne-logo-text">WYNE STORE</span>
                            <span style="font-size: 11px; background: rgba(245, 214, 152, 0.15); border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 3px 9px; border-radius: 50px; font-family: var(--font-sub); font-weight: 700; white-space: nowrap;">
                                👑 ADMIN PANEL
                            </span>
                        </a>
                    </div>

                    {{-- Center: Admin Dashboard Links --}}
                    <ul class="floating-nav-links">
                        <li><a href="#overview" data-nav="#overview" onclick="onAdminNavClick('#overview')" class="floating-nav-link active">Overview</a></li>
                        <li><a href="#bookings" data-nav="#bookings" onclick="onAdminNavClick('#bookings')" class="floating-nav-link">Reservasi Booking</a></li>
                        <li><a href="#bays" data-nav="#bays" onclick="onAdminNavClick('#bays')" class="floating-nav-link">Progres Bay</a></li>
                        <li><a href="#users" data-nav="#users" onclick="onAdminNavClick('#users')" class="floating-nav-link">Pengguna</a></li>
                    </ul>

                    {{-- Right Actions: Back to Main Website + Admin Profile --}}
                    <div class="floating-nav-actions">
                        <a href="{{ route('home') }}" class="nav-pill-btn" style="background: transparent; border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 8px 16px; font-size: 12px;" title="Lihat Website Utama Store">
                            <span>🌐 KE WEBSITE</span>
                        </a>

                        @auth
                            <div class="user-nav-profile" style="display: flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.06); padding: 4px 10px 4px 4px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.1);">
                                <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
                                <span style="font-size: 13px; font-weight: 600; color: #ffffff; max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ Auth::user()->name }}
                                </span>
                                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 2px 6px; font-size: 12px; font-weight: 700;" title="Logout Admin">
                                        ✕
                                    </button>
                                </form>
                            </div>
                        @endauth

                        {{-- Mobile Hamburger Button --}}
                        <button class="floating-hamburger-btn" id="adminMobileMenuBtn" onclick="toggleAdminMobileNavMenu()" aria-label="Toggle Admin Menu">
                            <svg class="hamburger-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                            <svg class="close-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="display: none;">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </nav>

                {{-- Admin Mobile Dropdown --}}
                <div class="mobile-nav-dropdown" id="adminMobileNavDropdown">
                    <div class="mobile-dropdown-header">
                        <div>
                            <div class="wyne-logo-text" style="font-size: 20px;">WYNE STORE ADMIN</div>
                            <div style="font-size: 11px; color: var(--text-muted); font-family: var(--font-sub);">WORKSHOP MANAGEMENT PANEL</div>
                        </div>
                        <span style="font-size: 11px; color: var(--accent-gold); font-weight: 700; background: rgba(245,214,152,0.1); border: 1px solid var(--accent-gold); padding: 4px 10px; border-radius: 50px;">
                            👑 ADMIN
                        </span>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; background: rgba(255,255,255,0.05); border-radius: 10px; border: 1px solid var(--border-color);">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}" style="width: 34px; height: 34px; border-radius: 50%;">
                            <div>
                                <div style="font-size: 13.5px; font-weight: 700; color: #ffffff;">{{ Auth::user()->name }}</div>
                                <div style="font-size: 11px; color: var(--text-muted);">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="btn-outline" style="padding: 4px 10px; font-size: 11px;">LOGOUT</button>
                        </form>
                    </div>

                    <nav class="mobile-dropdown-links">
                        <a href="#overview" onclick="onAdminNavClick('#overview'); closeAdminMobileNavMenu();" class="mobile-dropdown-link active">
                            <span>Overview & Ringkasan</span>
                        </a>
                        <a href="#bookings" onclick="onAdminNavClick('#bookings'); closeAdminMobileNavMenu();" class="mobile-dropdown-link">
                            <span>Daftar Reservasi Booking</span>
                        </a>
                        <a href="#bays" onclick="onAdminNavClick('#bays'); closeAdminMobileNavMenu();" class="mobile-dropdown-link">
                            <span>Manajemen Workshop Bay</span>
                        </a>
                        <a href="#users" onclick="onAdminNavClick('#users'); closeAdminMobileNavMenu();" class="mobile-dropdown-link">
                            <span>Pengguna Terdaftar</span>
                        </a>
                    </nav>

                    <div class="mobile-dropdown-footer">
                        <a href="{{ route('home') }}" class="btn-gold" style="width: 100%; justify-content: center; padding: 12px; font-size: 14px; text-decoration: none;">
                            🌐 KE WEBSITE UTAMA STORE
                        </a>
                    </div>
                </div>
            </div>

            <div class="mobile-nav-backdrop" id="adminMobileNavBackdrop" onclick="closeAdminMobileNavMenu()"></div>

            {{-- Flash Messages --}}
            @if(session('success') || session('error'))
                <div id="flashMessage" style="position: fixed; top: 84px; left: 50%; transform: translateX(-50%); z-index: 1100; max-width: 480px; width: calc(100vw - 32px);">
                    @if(session('success'))
                        <div style="background: rgba(34,197,94,0.12); border: 1px solid #22c55e; color: #22c55e; padding: 12px 18px; border-radius: 8px; font-size: 13.5px; font-family: var(--font-sub); font-weight: 600; backdrop-filter: blur(12px);">
                            ✓ {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div style="background: rgba(239,68,68,0.12); border: 1px solid #ef4444; color: #ef4444; padding: 12px 18px; border-radius: 8px; font-size: 13.5px; font-family: var(--font-sub); font-weight: 600; backdrop-filter: blur(12px);">
                            ✕ {{ session('error') }}
                        </div>
                    @endif
                </div>
                <script>
                    setTimeout(() => {
                        const el = document.getElementById('flashMessage');
                        if (el) { el.style.transition = 'opacity 0.5s'; el.style.opacity = '0'; setTimeout(() => el.remove(), 500); }
                    }, 4000);
                </script>
            @endif

            <!-- Main Admin Content Area -->
            <main class="content-body">
                @yield('content')
            </main>

            <!-- Admin Footer -->
            <footer class="footer">
                <div>
                    <div class="footer-brand">WYNE STORE // ADMIN PANEL</div>
                    <div class="footer-copy">&copy; {{ date('Y') }} WYNE STORE WORKSHOP CONTROL PANEL. AUTHORIZED PERSONNEL ONLY.</div>
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
                    <li><a href="{{ route('home') }}" class="footer-link-item">🌐 LIHAT WEBSITE</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0; inline-block;">
                            @csrf
                            <button type="submit" class="footer-link-item" style="background: none; border: none; cursor: pointer; padding: 0;">LOGOUT</button>
                        </form>
                    </li>
                </ul>
            </footer>
        </div>
    </div>

    <script>
        function onAdminNavClick(targetHash) {
            document.querySelectorAll('[data-nav]').forEach(el => {
                if (el.getAttribute('data-nav') === targetHash) {
                    el.classList.add('active');
                } else {
                    el.classList.remove('active');
                }
            });
        }

        function toggleAdminMobileNavMenu() {
            const dropdown = document.getElementById('adminMobileNavDropdown');
            const backdrop = document.getElementById('adminMobileNavBackdrop');
            const btn = document.getElementById('adminMobileMenuBtn');
            const hamburgerIcon = btn.querySelector('.hamburger-icon');
            const closeIcon = btn.querySelector('.close-icon');

            const isOpen = dropdown.classList.contains('active');
            if (isOpen) {
                closeAdminMobileNavMenu();
            } else {
                dropdown.classList.add('active');
                backdrop.classList.add('active');
                hamburgerIcon.style.display = 'none';
                closeIcon.style.display = 'block';
            }
        }

        function closeAdminMobileNavMenu() {
            const dropdown = document.getElementById('adminMobileNavDropdown');
            const backdrop = document.getElementById('adminMobileNavBackdrop');
            const btn = document.getElementById('adminMobileMenuBtn');
            const hamburgerIcon = btn.querySelector('.hamburger-icon');
            const closeIcon = btn.querySelector('.close-icon');

            dropdown.classList.remove('active');
            backdrop.classList.remove('active');
            hamburgerIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    </script>
</body>
</html>
