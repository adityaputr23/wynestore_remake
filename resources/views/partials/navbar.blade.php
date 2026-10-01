{{-- FLOATING CAPSULE NAVBAR (Simplified & Compact Dropdown) --}}
<div class="floating-navbar-container">
    <nav class="floating-navbar">
        {{-- Left: Circle Badge Logo --}}
        <a href="{{ route('home') }}" class="nav-logo-badge" title="WYNE STORE - Home">
            <img src="/images/wyne_store_logo.jpg" alt="WYNE STORE Logo">
        </a>

        <a href="{{ route('home') }}" class="wyne-brand-link" style="text-decoration: none;">
            <span class="wyne-logo-text">WYNE STORE</span>
        </a>

        {{-- Desktop Navigation Links: 3 Main Links + Compact Sub-Dropdown --}}
        <ul class="floating-nav-links">
            <li><a href="{{ request()->routeIs('home') ? '#home' : route('home').'#home' }}" data-nav="#home" onclick="onNavClick('#home')" class="floating-nav-link active">Home</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#services' : route('home').'#services' }}" data-nav="#services" onclick="onNavClick('#services')" class="floating-nav-link">Services</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#inventory' : route('home').'#inventory' }}" data-nav="#inventory" onclick="onNavClick('#inventory')" class="floating-nav-link">Inventory</a></li>
            
            {{-- Compact Desktop Dropdown "Lainnya ▾" --}}
            <li style="position: relative;" class="nav-dropdown-wrapper">
                <button type="button" class="floating-nav-link" id="desktopDropdownBtn" onclick="toggleDesktopDropdown(event)" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                    <span>Lainnya</span>
                    <span style="font-size: 10px; color: var(--accent-gold);">▾</span>
                </button>
                <div class="desktop-sub-dropdown" id="desktopSubDropdown">
                    <a href="{{ request()->routeIs('home') ? '#lighting' : route('home').'#lighting' }}" data-nav="#lighting" onclick="onNavClick('#lighting'); closeDesktopDropdown();">Custom Lighting</a>
                    <a href="{{ request()->routeIs('home') ? '#motorcycles' : route('home').'#motorcycles' }}" data-nav="#motorcycles" onclick="onNavClick('#motorcycles'); closeDesktopDropdown();">Motorcycles Showcase</a>
                    <a href="{{ request()->routeIs('home') ? '#queue' : route('home').'#queue' }}" data-nav="#queue" onclick="onNavClick('#queue'); closeDesktopDropdown();">Workshop Queue</a>
                    <a href="{{ request()->routeIs('home') ? '#updates' : route('home').'#updates' }}" data-nav="#updates" onclick="onNavClick('#updates'); closeDesktopDropdown();">Garage Updates</a>
                </div>
            </li>
        </ul>

        {{-- Right Actions --}}
        <div class="floating-nav-actions">
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-gold" style="padding: 7px 14px; font-size: 11.5px; text-decoration: none;">
                        👑 ADMIN PANEL
                    </a>
                @endif

                <div class="user-nav-profile" style="display: flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.06); padding: 4px 10px 4px 4px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.1);">
                    <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}" style="width: 28px; height: 28px; border-radius: 50%; object-fit: cover;">
                    <span style="font-size: 12px; font-weight: 600; color: #ffffff; max-width: 90px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 2px 4px; font-size: 11px; font-weight: 700;" title="Logout">
                            ✕
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-pill-btn" style="background: transparent; border: 1px solid var(--accent-gold); color: var(--accent-gold); padding: 7px 16px; font-size: 12px;">
                    <span>MASUK</span>
                </a>
            @endauth

            <a href="{{ request()->routeIs('home') ? '#booking' : route('home').'#booking' }}"
               data-nav="#booking"
               onclick="onNavClick('#booking')"
               class="nav-pill-btn" style="padding: 7px 16px; font-size: 12px;">
                <span>BOOK SERVICE</span>
            </a>

            {{-- 3-Lines Hamburger Button (For Mobile Screens) --}}
            <button class="floating-hamburger-btn" id="mobileMenuBtn" onclick="toggleMobileNavMenu()" aria-label="Toggle Navigation Menu">
                <svg class="hamburger-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                <svg class="close-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" style="display: none;">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobile Dropdown Card --}}
    <div class="mobile-nav-dropdown" id="mobileNavDropdown">
        <div class="mobile-dropdown-header">
            <div>
                <div class="wyne-logo-text" style="font-size: 18px;">WYNE STORE</div>
                <div style="font-size: 10.5px; color: var(--text-muted); font-family: var(--font-sub);">WORKSHOP SECTIONS</div>
            </div>
            @auth
                <div style="font-size: 10px; color: var(--accent-gold); font-weight: 700; background: rgba(245,214,152,0.1); border: 1px solid var(--accent-gold); padding: 3px 8px; border-radius: 50px;">
                    {{ Auth::user()->isAdmin() ? '👑 ADMIN' : '👤 USER' }}
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-gold" style="padding: 4px 12px; font-size: 10.5px; text-decoration: none;">
                    MASUK AKUN
                </a>
            @endauth
        </div>

        <nav class="mobile-dropdown-links">
            <a href="{{ request()->routeIs('home') ? '#home' : route('home').'#home' }}" data-nav="#home" onclick="onNavClick('#home'); closeMobileNavMenu();" class="mobile-dropdown-link active">
                <span>Home</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#services' : route('home').'#services' }}" data-nav="#services" onclick="onNavClick('#services'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Services</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#inventory' : route('home').'#inventory' }}" data-nav="#inventory" onclick="onNavClick('#inventory'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Inventory & Spareparts</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#lighting' : route('home').'#lighting' }}" data-nav="#lighting" onclick="onNavClick('#lighting'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Custom Lighting Kits</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#motorcycles' : route('home').'#motorcycles' }}" data-nav="#motorcycles" onclick="onNavClick('#motorcycles'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Motorcycles Showcase</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#queue' : route('home').'#queue' }}" data-nav="#queue" onclick="onNavClick('#queue'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Workshop Queue Bays</span>
            </a>
            <a href="{{ request()->routeIs('home') ? '#updates' : route('home').'#updates' }}" data-nav="#updates" onclick="onNavClick('#updates'); closeMobileNavMenu();" class="mobile-dropdown-link">
                <span>Garage Updates</span>
            </a>
        </nav>

        <div class="mobile-dropdown-footer">
            <a href="{{ request()->routeIs('home') ? '#booking' : route('home').'#booking' }}" onclick="onNavClick('#booking'); closeMobileNavMenu();" class="btn-gold" style="width: 100%; justify-content: center; padding: 10px; font-size: 12px; text-decoration: none;">
                ⚡ BOOK SERVICE SLOT
            </a>
        </div>
    </div>
</div>

{{-- Mobile Menu Backdrop Overlay --}}
<div class="mobile-nav-backdrop" id="mobileNavBackdrop" onclick="closeMobileNavMenu()"></div>

<script>
let isManualClick = false;

function toggleDesktopDropdown(e) {
    if (e) e.stopPropagation();
    const menu = document.getElementById('desktopSubDropdown');
    menu.classList.toggle('active');
}

function closeDesktopDropdown() {
    const menu = document.getElementById('desktopSubDropdown');
    if (menu) menu.classList.remove('active');
}

document.addEventListener('click', (e) => {
    const wrapper = document.querySelector('.nav-dropdown-wrapper');
    if (wrapper && !wrapper.contains(e.target)) {
        closeDesktopDropdown();
    }
});

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
    const hamburgerIcon = btn ? btn.querySelector('.hamburger-icon') : null;
    const closeIcon = btn ? btn.querySelector('.close-icon') : null;

    const isOpen = dropdown.classList.contains('active');

    if (isOpen) {
        closeMobileNavMenu();
    } else {
        dropdown.classList.add('active');
        backdrop.classList.add('active');
        if (hamburgerIcon && closeIcon) {
            hamburgerIcon.style.display = 'none';
            closeIcon.style.display = 'block';
        }
    }
}

function closeMobileNavMenu() {
    const dropdown = document.getElementById('mobileNavDropdown');
    const backdrop = document.getElementById('mobileNavBackdrop');
    const btn = document.getElementById('mobileMenuBtn');
    const hamburgerIcon = btn ? btn.querySelector('.hamburger-icon') : null;
    const closeIcon = btn ? btn.querySelector('.close-icon') : null;

    dropdown.classList.remove('active');
    backdrop.classList.remove('active');
    if (hamburgerIcon && closeIcon) {
        hamburgerIcon.style.display = 'block';
        closeIcon.style.display = 'none';
    }
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
