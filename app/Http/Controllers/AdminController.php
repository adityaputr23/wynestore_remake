<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\WorkshopQueue;
use App\Models\Service;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Dashboard Main View
     */
    public function index()
    {
        $bookings = Booking::with('service')->orderBy('id', 'desc')->get();
        $queues = WorkshopQueue::orderBy('id', 'asc')->get();
        $users = User::orderBy('id', 'desc')->get();

        $totalBookings = $bookings->count();
        $pendingBookings = $bookings->where('status', 'pending')->count();
        $confirmedBookings = $bookings->where('status', 'confirmed')->count();
        $activeBays = $queues->where('status', 'in_workshop')->count();

        return view('admin.dashboard', compact(
            'bookings',
            'queues',
            'users',
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'activeBays'
        ));
    }

    /**
     * Update Booking Status
     */
    public function updateBookingStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:pending,confirmed,in_workshop,completed,cancelled'],
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', "Status booking {$booking->booking_code} diperbarui menjadi " . strtoupper($request->status));
    }

    /**
     * Update Workshop Queue Stage & Progress
     */
    public function updateQueueProgress(Request $request, $id)
    {
        $request->validate([
            'stage' => ['required', 'string'],
            'progress_percent' => ['required', 'integer', 'min:0', 'max:100'],
            'mechanic_in_charge' => ['nullable', 'string'],
        ]);

        $queue = WorkshopQueue::findOrFail($id);
        $queue->stage = $request->stage;
        $queue->progress_percent = $request->progress_percent;
        if ($request->filled('mechanic_in_charge')) {
            $queue->mechanic_in_charge = $request->mechanic_in_charge;
        }

        if ($request->progress_percent >= 100) {
            $queue->status = 'completed';
        }

        $queue->save();

        return back()->with('success', "Progres antrean {$queue->queue_code} diperbarui ({$queue->progress_percent}%)");
    }
}
