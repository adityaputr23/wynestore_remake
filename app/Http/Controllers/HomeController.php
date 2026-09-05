<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\WorkshopQueue;
use App\Models\Booking;
use App\Models\Motorcycle;
use App\Models\Product;
use App\Models\GarageUpdate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('number_code', 'asc')->get();
        $queues = WorkshopQueue::with('booking.service')->orderBy('id', 'asc')->get();
        $totalBookings = Booking::count();
        $activeInShop = WorkshopQueue::where('status', 'in_workshop')->count();

        $products = Product::orderBy('id', 'asc')->get();
        $lightingProducts = Product::where('category', 'Lighting')->get();
        $motorcycles = Motorcycle::orderBy('id', 'desc')->get();
        $garageUpdates = GarageUpdate::orderBy('id', 'desc')->get();

        return view('home', compact(
            'services',
            'queues',
            'totalBookings',
            'activeInShop',
            'motorcycles',
            'products',
            'lightingProducts',
            'garageUpdates'
        ));
    }

    public function inventory()
    {
        $products = Product::orderBy('id', 'asc')->get();
        $services = Service::all();
        return view('inventory', compact('products', 'services'));
    }

    public function services()
    {
        $services = Service::orderBy('number_code', 'asc')->get();
        return view('services', compact('services'));
    }

    public function lighting()
    {
        $lightingProducts = Product::where('category', 'Lighting')->get();
        $lightingService = Service::where('slug', 'custom-lighting-kits')->first();
        $services = Service::all();
        return view('lighting', compact('lightingProducts', 'lightingService', 'services'));
    }

    public function motorcycles()
    {
        $motorcycles = Motorcycle::orderBy('id', 'desc')->get();
        $services = Service::all();
        return view('motorcycles', compact('motorcycles', 'services'));
    }

    public function queue()
    {
        $queues = WorkshopQueue::with('booking.service')->orderBy('id', 'asc')->get();
        $services = Service::all();
        return view('queue', compact('queues', 'services'));
    }

    public function updates()
    {
        $garageUpdates = GarageUpdate::orderBy('id', 'desc')->get();
        $services = Service::all();
        return view('updates', compact('garageUpdates', 'services'));
    }

    public function bookingPage(Request $request)
    {
        $services = Service::orderBy('number_code', 'asc')->get();
        $selectedServiceId = $request->query('service_id');
        return view('booking', compact('services', 'selectedServiceId'));
    }
}
