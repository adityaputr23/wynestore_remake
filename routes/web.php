<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

// Main Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/inventory', [HomeController::class, 'inventory'])->name('inventory');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/custom-lighting', [HomeController::class, 'lighting'])->name('lighting');
Route::get('/motorcycles', [HomeController::class, 'motorcycles'])->name('motorcycles');
Route::get('/workshop-queue', [HomeController::class, 'queue'])->name('workshop.queue');
Route::get('/updates', [HomeController::class, 'updates'])->name('updates');
Route::get('/booking', [HomeController::class, 'bookingPage'])->name('booking.create');

// API & Public Endpoints
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/track', [BookingController::class, 'track'])->name('booking.track');
Route::get('/api/workshop-queue', [QueueController::class, 'index'])->name('queue.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google OAuth Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Admin Protected Routes
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/booking/{id}/status', [AdminController::class, 'updateBookingStatus'])->name('booking.status');
    Route::post('/queue/{id}/progress', [AdminController::class, 'updateQueueProgress'])->name('queue.progress');
});
