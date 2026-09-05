<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\WorkshopQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'required|string|max:50',
            'motorcycle_model' => 'required|string|max:255',
            'motorcycle_year' => 'nullable|string|max:10',
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required|string',
            'notes' => 'nullable|string|max:1000',
        ]);

        $bookingCode = 'WYN-' . strtoupper(Str::random(4));

        $booking = Booking::create([
            'booking_code' => $bookingCode,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'motorcycle_model' => $validated['motorcycle_model'],
            'motorcycle_year' => $validated['motorcycle_year'] ?? date('Y'),
            'service_id' => $validated['service_id'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'notes' => $validated['notes'],
            'status' => 'pending',
        ]);

        // Create initial queue slot
        $queueCount = WorkshopQueue::count() + 1;
        $queueCode = 'BAY-' . str_pad($queueCount, 2, '0', STR_PAD_LEFT);
        
        $service = Service::find($validated['service_id']);

        WorkshopQueue::create([
            'queue_code' => $queueCode,
            'booking_id' => $booking->id,
            'bike_name' => $validated['motorcycle_model'] . ' (' . $validated['customer_name'] . ')',
            'stage' => 'Queued for Inspection',
            'progress_percent' => 10,
            'mechanic_in_charge' => 'Assigned Lead Mechanic',
            'estimated_completion' => $validated['booking_date'] . ' ' . $validated['booking_time'],
            'status' => 'queued',
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Booking successfully created!',
                'booking_code' => $bookingCode,
                'booking' => $booking->load('service')
            ]);
        }

        return redirect()->back()->with('success', 'Booking berhasil dibuat! Kode antrean Anda: ' . $bookingCode);
    }

    public function track(Request $request)
    {
        $code = trim($request->input('code'));
        if (!$code) {
            return response()->json(['success' => false, 'message' => 'Kode booking tidak boleh kosong.'], 400);
        }

        $booking = Booking::with(['service', 'queue'])->where('booking_code', $code)->first();

        if (!$booking) {
            return response()->json(['success' => false, 'message' => 'Kode booking "' . $code . '" tidak ditemukan.'], 444);
        }

        return response()->json([
            'success' => true,
            'booking' => $booking,
        ]);
    }
}
