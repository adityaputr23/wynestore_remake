@extends('layouts.auth')

@section('auth-title', 'Login')

@section('content')
{{-- Title --}}
<div style="margin-bottom: 24px;">
    <h1 style="font-family: var(--font-heading); font-size: 36px; font-weight: 700; color: #ffffff; text-transform: uppercase; line-height: 1.1; margin-bottom: 8px;">
        Login
    </h1>
    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.5;">
        Masuk ke akun Anda untuk melihat booking, garasi, dan fitur workshop.
    </p>
</div>

@if (session('success'))
    <div style="background: rgba(34,197,94,0.12); border: 1px solid #22c55e; color: #22c55e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 13.5px; font-weight: 600;">
        &#x2713; {{ session('success') }}
    </div>
@endif

{{-- Form Card --}}
<div style="background: var(--glass-bg); border: 1px solid var(--border-color); padding: 28px; border-radius: 12px;">

    {{-- Google OAuth Button --}}
    <a href="{{ route('auth.google') }}" style="display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; padding: 12px; background: #ffffff; color: #000000; font-family: var(--font-sub); font-size: 13.5px; font-weight: 700; border-radius: 50px; text-decoration: none; margin-bottom: 20px; transition: opacity 0.2s;">
        <svg width="18" height="18" viewBox="0 0 24 24">
            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
        </svg>
        Masuk dengan Google
    </a>

    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
        <div style="flex: 1; height: 1px; background: var(--border-color);"></div>
        <span style="font-size: 11px; color: var(--text-dim); letter-spacing: 1px; font-weight: 700; font-family: var(--font-sub);">ATAU EMAIL</span>
        <div style="flex: 1; height: 1px; background: var(--border-color);"></div>
    </div>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-input" placeholder="contoh@email.com" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span style="font-size: 12px; color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-input" placeholder="••••••••" required>
        </div>

        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px;">
            <input type="checkbox" name="remember" id="remember" style="accent-color: var(--accent-gold); width: 16px; height: 16px;">
            <label for="remember" style="font-size: 13px; color: var(--text-muted); cursor: pointer;">Ingat Saya</label>
        </div>

        <button type="submit" class="btn-gold" style="width: 100%; padding: 13px; font-size: 14px;">
            MASUK SEKARANG &rsaquo;
        </button>
    </form>

    <p style="margin-top: 20px; text-align: center; font-size: 13.5px; color: var(--text-muted);">
        Belum punya akun?
        <a href="{{ route('register') }}" style="color: var(--accent-gold); font-weight: 700; text-decoration: none;">Daftar Disini</a>
    </p>
</div>

{{-- Test Credentials --}}
<div style="background: rgba(255,255,255,0.03); border: 1px dashed rgba(255,255,255,0.12); padding: 14px 16px; border-radius: 8px; font-size: 12px;">
    <div style="color: var(--accent-gold); font-weight: 700; margin-bottom: 6px; font-family: var(--font-sub); letter-spacing: 0.5px;">&#x1F511; TEST CREDENTIALS</div>
    <div style="color: var(--text-muted); margin-bottom: 2px;"><strong style="color: var(--text-main);">Admin</strong> &mdash; <code>admin@wynestore.id</code> / <code>password123</code></div>
    <div style="color: var(--text-muted);"><strong style="color: var(--text-main);">User</strong> &mdash; <code>user@wynestore.id</code> / <code>password123</code></div>
</div>
@endsection
