<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show Login Form
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }
        return view('auth.login');
    }

    /**
     * Handle Login Submission
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin ' . $user->name);
            }

            return redirect()->route('home')->with('success', 'Berhasil login sebagai ' . $user->name);
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak cocok.',
        ])->onlyInput('email');
    }

    /**
     * Show Registration Form
     */
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    /**
     * Handle User Registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'in:user,admin'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&background=' . ($request->role === 'admin' ? 'F5D698&color=000000' : '1e2230&color=ffffff'),
        ]);

        Auth::login($user);

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('success', 'Akun Admin berhasil dibuat!');
        }

        return redirect()->route('home')->with('success', 'Pendaftaran berhasil! Selamat bergabung di Wyne Store.');
    }

    /**
     * Handle Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Anda telah keluar.');
    }

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        // Check if real keys are provided in .env
        $clientId = config('services.google.client_id');
        if (empty($clientId) || $clientId === 'your_google_client_id_here') {
            // Fallback for local testing without real API credentials
            return $this->handleGoogleDemoLogin();
        }

        try {
            return Socialite::driver('google')->redirect();
        } catch (\Throwable $e) {
            return $this->handleGoogleDemoLogin();
        }
    }

    /**
     * Handle Google OAuth Callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if ($user) {
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar() ?? $user->avatar,
                ]);
            } else {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar() ?? 'https://ui-avatars.com/api/?name=' . urlencode($googleUser->getName()),
                    'role' => 'user',
                    'password' => null,
                ]);
            }

            Auth::login($user);
            return redirect()->route('home')->with('success', 'Berhasil login via Google sebagai ' . $user->name);
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', 'Gagal autentikasi Google: ' . $e->getMessage());
        }
    }

    /**
     * Demo Fallback Google Login for instant testing without API keys
     */
    protected function handleGoogleDemoLogin()
    {
        $demoEmail = 'google.user@wynestore.id';
        $user = User::where('email', $demoEmail)->first();

        if (!$user) {
            $user = User::create([
                'name' => 'Google User (Demo)',
                'email' => $demoEmail,
                'google_id' => 'google_demo_10928374',
                'avatar' => 'https://lh3.googleusercontent.com/a/default-user',
                'role' => 'user',
                'password' => null,
            ]);
        }

        Auth::login($user);
        return redirect()->route('home')->with('success', '⚡ Logged in via Google OAuth (Demo Mode)');
    }
}
