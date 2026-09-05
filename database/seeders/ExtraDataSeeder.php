<?php

namespace Database\Seeders;

use App\Models\Motorcycle;
use App\Models\Product;
use App\Models\GarageUpdate;
use Illuminate\Database\Seeder;

class ExtraDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Motorcycles
        Motorcycle::create([
            'name' => 'Wyne Thunderbolt #07 Bobber',
            'category' => 'Bobber',
            'specs' => 'Harley 883cc, Custom Hardtail Frame, RGB Halo LED',
            'build_cost' => 85000000,
            'status' => 'Delivered to Owner',
            'description' => 'Custom aggressive bobber build with hand-welded sissy bar, wrapped dual exhaust, and custom wire harness.'
        ]);

        Motorcycle::create([
            'name' => 'Yamaha XSR 155 Neo Cafe Racer',
            'category' => 'Cafe Racer',
            'specs' => '155cc VVA, Clip-on Bars, Dyno Remapped ECU, Custom LED Tail',
            'build_cost' => 42000000,
            'status' => 'Available for Order',
            'description' => 'Sleek dark cafe racer with inverted front forks, custom leather solo seat, and laser-etched Wyne Store emblem.'
        ]);

        Motorcycle::create([
            'name' => 'Kawasaki W175 Scrambler #KASIHPETIR',
            'category' => 'Scrambler',
            'specs' => '177cc Carb, High-pipe Exhaust, Knobby Tires, Halo LED Headlight',
            'build_cost' => 38000000,
            'status' => 'In Workshop Bay 01',
            'description' => 'Rugged all-terrain scrambler engineered for adventure and city commanding presence.'
        ]);

        // Seed Products / Parts
        Product::create([
            'name' => 'Wyne Thunder Halo 7" LED Headlight Kit',
            'category' => 'Lighting',
            'price' => 1250000,
            'stock' => 15,
            'description' => 'High-intensity projector LED with dual RGB halo rings and integrated sequential turn signals.'
        ]);

        Product::create([
            'name' => 'Custom CNC Billet Aluminium Levers (Pair)',
            'category' => 'CNC Parts',
            'price' => 650000,
            'stock' => 20,
            'description' => 'Precision CNC machined 6061 aluminium brake and clutch levers with anodized black finish.'
        ]);

        Product::create([
            'name' => 'Wyne Custom Stainless Exhaust Muffler',
            'category' => 'Exhaust',
            'price' => 2200000,
            'stock' => 8,
            'description' => 'Hand-welded TIG stainless steel Megaphone exhaust pipe for deep bass rumble and horsepower gain.'
        ]);

        Product::create([
            'name' => 'Heavy Duty Plug & Play Wiring Loom',
            'category' => 'Lighting',
            'price' => 450000,
            'stock' => 25,
            'description' => 'Weatherproof relay wiring harness with built-in fuse box and waterproof connectors.'
        ]);

        // Seed Garage Updates
        GarageUpdate::create([
            'title' => 'Project Thunderbolt #07 Completed & Dyno Tested',
            'author' => 'Master Mechanic Alex',
            'date_str' => '12 August 2026',
            'summary' => 'Our latest custom Bobber project has hit the dyno, pumping out a 15% increase in torque.',
            'content' => 'After 4 weeks of frame fabrication and custom loom wiring, Project Thunderbolt #07 passed final quality inspection. Peak torque reached 74 Nm at 3,800 RPM.'
        ]);

        GarageUpdate::create([
            'title' => 'New Dyno Calibration Rig Installed at Workshop Bay 02',
            'author' => 'Tuning Team',
            'date_str' => '05 August 2026',
            'summary' => 'We upgraded our tuning center with state-of-the-art dyno sensors for real-time ECU mapping.',
            'content' => 'Clients can now request real-time AFR graph readouts and horsepower certificate printouts with every Performance Tuning service package.'
        ]);
    }
}
