@extends('layouts.auth')

@section('auth-title', 'Daftar Akun')

@section('content')
{{-- Title --}}
<div style="margin-bottom: 24px;">
    <h1 style="font-family: var(--font-heading); font-size: 36px; font-weight: 700; color: #ffffff; text-transform: uppercase; line-height: 1.1; margin-bottom: 8px;">
        Daftar Akun
    </h1>
    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.5;">
        Buat akun baru untuk booking layanan workshop dan pelacakan unit motor Anda.
    </p>
</div>

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
        Daftar dengan Google
    </a>

    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
        <div style="flex: 1; height: 1px; background: var(--border-color);"></div>
        <span style="font-size: 11px; color: var(--text-dim); letter-spacing: 1px; font-weight: 700; font-family: var(--font-sub);">ATAU FORMULIR</span>
        <div style="flex: 1; height: 1px; background: var(--border-color);"></div>
    </div>

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-input" placeholder="e.g. Aditya Pratama" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span style="font-size: 12px; color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-input" placeholder="name@domain.com" value="{{ old('email') }}" required>
            @error('email')
                <span style="font-size: 12px; color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-input" placeholder="Minimal 6 karakter" required>
            @error('password')
                <span style="font-size: 12px; color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
        </div>

        <div class="form-group">
            <label class="form-label">Tipe Akun</label>
            <select name="role" class="form-select" required>
                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Pelanggan / Customer</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator Workshop</option>
            </select>
            @error('role')
                <span style="font-size: 12px; color: #ef4444; margin-top: 4px; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-gold" style="width: 100%; padding: 13px; font-size: 14px; margin-top: 4px;">
            BUAT AKUN &rsaquo;
        </button>
    </form>

    <p style="margin-top: 20px; text-align: center; font-size: 13.5px; color: var(--text-muted);">
        Sudah punya akun?
        <a href="{{ route('login') }}" style="color: var(--accent-gold); font-weight: 700; text-decoration: none;">Masuk Disini</a>
    </p>
</div>
@endsection
