{{-- FLOATING CAPSULE NAVBAR (Reference Image Layout with 3-lines Menu Popup) --}}
<div class="floating-navbar-container">
    <nav class="floating-navbar">
        {{-- Left: Circle Badge Logo --}}
        <a href="{{ route('home') }}" class="nav-logo-badge" title="WYNE STORE - Home">
            <img src="{{ asset('images/wyne_store_logo.jpg') }}" alt="WYNE STORE Logo">
        </a>

        <a href="{{ route('home') }}" class="wyne-brand-link" style="text-decoration: none;">
            <span class="wyne-logo-text">WYNE STORE</span>
        </a>

        {{-- Desktop Navigation Links (Visible on screen width >= 1024px) --}}
        <ul class="floating-nav-links">
            <li><a href="{{ request()->routeIs('home') ? '#home' : route('home').'#home' }}" data-nav="#home" onclick="onNavClick('#home')" class="floating-nav-link active">Home</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#services' : route('home').'#services' }}" data-nav="#services" onclick="onNavClick('#services')" class="floating-nav-link">Services</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#inventory' : route('home').'#inventory' }}" data-nav="#inventory" onclick="onNavClick('#inventory')" class="floating-nav-link">Inventory</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#lighting' : route('home').'#lighting' }}" data-nav="#lighting" onclick="onNavClick('#lighting')" class="floating-nav-link">Lighting</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#motorcycles' : route('home').'#motorcycles' }}" data-nav="#motorcycles" onclick="onNavClick('#motorcycles')" class="floating-nav-link">Motorcycles</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#queue' : route('home').'#queue' }}" data-nav="#queue" onclick="onNavClick('#queue')" class="floating-nav-link">Queue</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#updates' : route('home').'#updates' }}" data-nav="#updates" onclick="onNavClick('#updates')" class="floating-nav-link">Updates</a></li>
        </ul>

        {{-- Right Actions --}}
        <div class="floating-nav-actions">
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-gold" style="padding: 8px 16px; font-size: 12px; text-decoration: none;">
                        👑 ADMIN PANEL
                    </a>
                @endif

                <div class="user-nav-profile" style="display: flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.06); padding: 4px 10px 4px 4px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.1);">
                    <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
                    <span style="font-size: 13px; font-weight: 600; color: #ffffff; max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 2px 6px; font-size: 12px; font-weight: 700;" title="Logout">
                            ✕
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-pill-btn" style="background: transparent; border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 8px 18px; font-size: 13px;">
                    <span>MASUK</span>
                </a>
            @endauth

            <a href="{{ request()->routeIs('home') ? '#booking' : route('home').'#booking' }}"
               data-nav="#booking"
               onclick="onNavClick('#booking')"
               class="nav-pill-btn">
                <span>BOOK SERVICE</span>
            </a>

            {{-- 3-Lines Hamburger Button (Triggers Section Popup Menu) --}}
            <button class="floating-hamburger-btn" id="mobileMenuBtn" onclick="toggleMobileNavMenu()" aria-label="Toggle Navigation Menu">
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

    {{-- Floating Section Dropdown Card Attached Directly to Navbar --}}
    <div class="mobile-nav-dropdown" id="mobileNavDropdown">
        <div class="mobile-dropdown-header">
            <div>
                <div class="wyne-logo-text" style="font-size: 22px;">WYNE STORE</div>
                <div style="font-size: 11px; color: var(--text-muted); font-family: var(--font-sub);">WORKSHOP SECTIONS & NAVIGATION</div>
            </div>
            @auth
                <div style="font-size: 11px; color: var(--accent-gold); font-weight: 700; background: rgba(245,214,152,0.1); border: 1px solid var(--accent-gold); padding: 4px 10px; border-radius: 50px;">
                    {{ Auth::user()->isAdmin() ? '👑 ADMIN' : '👤 USER' }}
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-gold" style="padding: 4px 14px; font-size: 11px; text-decoration: none;">
                    MASUK AKUN
                </a>
            @endauth
        </div>

        @auth
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
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" onclick="closeMobileNavMenu()" class="btn-gold" style="width: 100%; justify-content: center; padding: 10px; text-decoration: none;">
                    👑 DASHBOARD MANAGEMENT ADMIN
                </a>
            @endif
        @endauth

        <div style="font-family: var(--font-sub); font-size: 11px; font-weight: 700; color: var(--accent-gold); letter-spacing: 1.5px; text-transform: uppercase; margin-top: 4px;">
            WORKSHOP SECTIONS
        </div>

        <nav class="mobile-dropdown-links">
            <a href="{{ request()->routeIs('home') ? '#home' : route('home').'#home' }}" data-nav="#home" onclick="onNavClick('#home'); closeMobileNavMenu();" class="mobile-dropdown-link active">
                <span>Home</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#services' : route('home').'#services' }}" data-nav="#services" onclick="onNavClick('#services'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Services</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#inventory' : route('home').'#inventory' }}" data-nav="#inventory" onclick="onNavClick('#inventory'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Inventory</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#lighting' : route('home').'#lighting' }}" data-nav="#lighting" onclick="onNavClick('#lighting'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Custom Lighting</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#motorcycles' : route('home').'#motorcycles' }}" data-nav="#motorcycles" onclick="onNavClick('#motorcycles'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Motorcycles</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#queue' : route('home').'#queue' }}" data-nav="#queue" onclick="onNavClick('#queue'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Workshop Queue</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#updates' : route('home').'#updates' }}" data-nav="#updates" onclick="onNavClick('#updates'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Garage Updates</span>
            </a>
        </nav>

        <div class="mobile-dropdown-footer">
            <a href="{{ request()->routeIs('home') ? '#booking' : route('home').'#booking' }}" onclick="onNavClick('#booking'); closeMobileNavMenu();" class="btn-gold" style="width: 100%; justify-content: center; padding: 12px; font-size: 14px; text-decoration: none;">
                ⚡ BOOK WORKSHOP SERVICE SLOT
            </a>
        </div>
    </div>
</div>

{{-- Mobile Menu Backdrop Overlay --}}
<div class="mobile-nav-backdrop" id="mobileNavBackdrop" onclick="closeMobileNavMenu()"></div>

<script>
let isManualClick = false;

function setActiveNavIndicator(targetHash) {
    if (!targetHash) return;
    document.querySelectorAll('[data-nav]').forEach(el => {
        if (el.getAttribute('data-nav') === targetHash) {
            el.classList.add('active');
        } else {
            el.classList.remove('active');
        }
    });
}

function onNavClick(targetHash) {
    isManualClick = true;
    setActiveNavIndicator(targetHash);
    setTimeout(() => { isManualClick = false; }, 800);
}

function toggleMobileNavMenu() {
    const dropdown = document.getElementById('mobileNavDropdown');
    const backdrop = document.getElementById('mobileNavBackdrop');
    const btn = document.getElementById('mobileMenuBtn');
    const hamburgerIcon = btn.querySelector('.hamburger-icon');
    const closeIcon = btn.querySelector('.close-icon');

    const isOpen = dropdown.classList.contains('active');

    if (isOpen) {
        closeMobileNavMenu();
    } else {
        dropdown.classList.add('active');
        backdrop.classList.add('active');
        hamburgerIcon.style.display = 'none';
        closeIcon.style.display = 'block';
    }
}

function closeMobileNavMenu() {
    const dropdown = document.getElementById('mobileNavDropdown');
    const backdrop = document.getElementById('mobileNavBackdrop');
    const btn = document.getElementById('mobileMenuBtn');
    const hamburgerIcon = btn.querySelector('.hamburger-icon');
    const closeIcon = btn.querySelector('.close-icon');

    dropdown.classList.remove('active');
    backdrop.classList.remove('active');
    hamburgerIcon.style.display = 'block';
    closeIcon.style.display = 'none';
}

// ScrollSpy to move active indicator as user scrolls through sections
document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('section[id]');
    if (sections.length === 0) return;

    const observerOptions = {
        root: null,
        rootMargin: '-25% 0px -50% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        if (isManualClick) return;
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setActiveNavIndicator('#' + entry.target.id);
            }
        });
    }, observerOptions);

    sections.forEach(section => observer.observe(section));
});
</script>
