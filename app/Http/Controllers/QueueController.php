<?php

namespace App\Http\Controllers;

use App\Models\WorkshopQueue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queues = WorkshopQueue::with(['booking.service'])->orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $queues
        ]);
    }
}
