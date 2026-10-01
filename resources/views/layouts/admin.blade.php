<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WYNE STORE // Admin Management Dashboard</title>
    <meta name="description" content="Workshop Control Panel & Admin Management for Wyne Store.">
    <link rel="stylesheet" href="/css/wynestore.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="admin-app-layout">

    {{-- LEFT SIDEBAR (DISHBOARD ADMIN WYNE STORE) --}}
    <aside class="admin-sidebar" id="adminSidebar">
        <div>
            {{-- Sidebar Brand Header --}}
            <div class="admin-brand-header">
                <a href="{{ route('admin.dashboard') }}" class="nav-logo-badge" title="WYNE STORE Admin">
                    <img src="{{ asset('images/wyne_store_logo.jpg') }}" alt="WYNE STORE Logo">
                </a>
                <div>
                    <div class="wyne-logo-text" style="font-size: 18px; line-height: 1.1;">WYNE STORE</div>
                    <div style="font-size: 10px; color: var(--accent-gold); font-family: var(--font-sub); font-weight: 700; letter-spacing: 1px;">
                        👑 ADMIN PANEL
                    </div>
                </div>
            </div>

            {{-- Navigation Groups Matching Wyne Store Main Web Sections --}}
            <nav class="admin-sidebar-nav">
                
                {{-- Group 1: OVERVIEW & DASHBOARD --}}
                <div>
                    <div class="sidebar-nav-group-title">Overview</div>
                    <ul class="sidebar-nav-list">
                        <li>
                            <a href="#overview" class="sidebar-nav-item active" onclick="setActiveNavItem(this)">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                                <span>Dashboard Overview</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Group 2: MANAJEMEN BENGKEL & SERVICE --}}
                <div>
                    <div class="sidebar-nav-group-title">Manajemen Workshop</div>
                    <ul class="sidebar-nav-list">
                        <li>
                            <a href="#bookings" class="sidebar-nav-item" onclick="setActiveNavItem(this)">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                </svg>
                                <span>Reservasi Booking</span>
                            </a>
                        </li>
                        <li>
                            <a href="#bays" class="sidebar-nav-item" onclick="setActiveNavItem(this)">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span>Progres Bay Queue</span>
                            </a>
                        </li>
                        <li>
                            <a href="#users" class="sidebar-nav-item" onclick="setActiveNavItem(this)">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Akun Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Group 3: KONTEN KATEGORI WEB UTAMA --}}
                <div>
                    <div class="sidebar-nav-group-title">Konten Web Utama</div>
                    <ul class="sidebar-nav-list">
                        <li>
                            <a href="{{ route('services') }}" class="sidebar-nav-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                                </svg>
                                <span>Services Arsenal</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('inventory') }}" class="sidebar-nav-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                </svg>
                                <span>Inventory & Parts</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('lighting') }}" class="sidebar-nav-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                </svg>
                                <span>Custom Lighting</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('motorcycles') }}" class="sidebar-nav-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                                <span>Motorcycle Fleet</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('updates') }}" class="sidebar-nav-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <span>Garage Updates</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Group 4: AKSES QUICK LINK --}}
                <div>
                    <div class="sidebar-nav-group-title">Akses Website</div>
                    <ul class="sidebar-nav-list">
                        <li>
                            <a href="{{ route('home') }}" class="sidebar-nav-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                                <span>🌐 Ke Website Utama</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>

        {{-- Sidebar Bottom User Quick Control --}}
        <div style="padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.06);">
            @auth
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px; background: rgba(255,255,255,0.04); padding: 8px 12px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.08);">
                    <div style="display: flex; align-items: center; gap: 10px; overflow: hidden;">
                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}" style="width: 32px; height: 32px; border-radius: 50%; flex-shrink: 0; object-fit: cover;">
                        <div style="overflow: hidden;">
                            <div style="font-size: 13px; font-weight: 600; color: #ffffff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Auth::user()->name }}</div>
                            <div style="font-size: 10px; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Administrator</div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" title="Logout" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px; font-weight: 700;">
                            ✕
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </aside>

    {{-- MAIN WRAPPER & TOP HEADER BAR --}}
    <div class="admin-main-wrapper" id="adminMainWrapper">
        
        {{-- TOP HEADER BAR --}}
        <header class="admin-top-header">
            <div class="admin-header-left">
                <button class="sidebar-toggle-btn" id="sidebarToggleBtn" onclick="toggleAdminSidebar()" title="Toggle Sidebar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="9" y1="3" x2="9" y2="21"></line>
                    </svg>
                </button>
                <span style="color: var(--border-accent); font-size: 18px;">|</span>
                <div class="admin-page-title-badge">
                    <span class="admin-page-title">Dashboard Management Wyne Store</span>
                </div>
            </div>

            <div class="admin-header-right">
                {{-- Language Flag Switcher --}}
                <button class="icon-btn-utility" title="Language Switcher" onclick="alert('Language: Indonesian (ID)')">
                    🇮🇩
                </button>

                {{-- Dark Theme Switcher --}}
                <button class="icon-btn-utility" title="Toggle Theme" onclick="alert('Theme Mode: Dark Active')">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </button>

                {{-- User Avatar Button --}}
                @auth
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--accent-gold);">
                    </div>
                @endauth
            </div>
        </header>

        {{-- Flash Messages --}}
        @if(session('success') || session('error'))
            <div id="flashMessage" style="position: fixed; top: 80px; right: 28px; z-index: 1100; max-width: 420px; width: calc(100vw - 32px);">
                @if(session('success'))
                    <div style="background: rgba(34,197,94,0.18); border: 1px solid #22c55e; color: #22c55e; padding: 12px 18px; border-radius: 12px; font-size: 13.5px; font-weight: 600; backdrop-filter: blur(12px); box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
                        ✓ {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div style="background: rgba(239,68,68,0.18); border: 1px solid #ef4444; color: #ef4444; padding: 12px 18px; border-radius: 12px; font-size: 13.5px; font-weight: 600; backdrop-filter: blur(12px); box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
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

        <!-- MAIN DASHBOARD CONTENT AREA -->
        <main style="flex: 1;">
            @yield('content')
        </main>

    </div>

    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const wrapper = document.getElementById('adminMainWrapper');
            if (window.innerWidth <= 1024) {
                sidebar.classList.toggle('mobile-open');
            } else {
                sidebar.classList.toggle('collapsed');
                wrapper.classList.toggle('full-width');
            }
        }

        function setActiveNavItem(element) {
            document.querySelectorAll('.sidebar-nav-item').forEach(el => el.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
</body>
</html>
