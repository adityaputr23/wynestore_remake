<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WYNE STORE // @yield('auth-title', 'Authentication')</title>
    <meta name="description" content="Login atau Daftar akun Wyne Store Workshop.">
    <link rel="stylesheet" href="{{ asset('css/wynestore.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <style>
        * { box-sizing: border-box; }

        .auth-page {
            min-height: 100vh;
            background: var(--bg-primary);
            display: flex;
            flex-direction: column;
        }

        /* Top bar: Logo kiri + kembali kanan — full width */
        .auth-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 32px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }

        .auth-header-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .auth-header-logo img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffffff;
        }

        .auth-header-logo-text {
            font-family: var(--font-brand), 'Teko', sans-serif;
            font-size: 18px;
            font-weight: 700;
            font-style: italic;
            color: var(--accent-gold);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .auth-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            text-decoration: none;
            font-family: var(--font-sub);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 7px 14px;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 50px;
            transition: all 0.18s ease;
        }

        .auth-back-link svg {
            transition: transform 0.18s ease;
        }

        .auth-back-link:hover {
            color: #ffffff;
            border-color: rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.06);
        }

        .auth-back-link:hover svg {
            transform: translateX(-2px);
        }

        /* Main content area — centered */
        .auth-body {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px 60px;
        }

        .auth-container {
            width: 100%;
            max-width: 440px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Flash message */
        .auth-flash-error {
            background: rgba(239,68,68,0.12);
            border: 1px solid #ef4444;
            color: #ef4444;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 13.5px;
            font-family: var(--font-sub);
            font-weight: 600;
        }

        @media (max-width: 640px) {
            .auth-header { padding: 16px 20px; }
            .auth-header-logo-text { font-size: 16px; }
            .auth-body { padding: 28px 16px 48px; align-items: flex-start; }
            .auth-container { max-width: 100%; }
        }
    </style>
</head>
<body>
    <div class="auth-page">

        {{-- Top Header Bar: Logo + Tombol Kembali --}}
        <header class="auth-header">
            {{-- Back Button kiri --}}
            <a href="{{ route('home') }}" class="auth-back-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Kembali
            </a>

            {{-- Logo kanan --}}
            <a href="{{ route('home') }}" class="auth-header-logo">
                <img src="{{ asset('images/wyne_store_logo.jpg') }}" alt="Wyne Store">
                <span class="auth-header-logo-text">WYNE STORE</span>
            </a>
        </header>

        {{-- Auth Form Content --}}
        <div class="auth-body">
            <div class="auth-container">
                @if(session('error'))
                    <div class="auth-flash-error">&#x2715; {{ session('error') }}</div>
                @endif

                @yield('content')
            </div>
        </div>

    </div>
</body>
</html>
