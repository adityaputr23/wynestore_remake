<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'number_code' => '01',
                'title' => 'CUSTOM LIGHTING KITS',
                'slug' => 'custom-lighting-kits',
                'category' => 'Custom Lighting',
                'tag' => 'ELECTRICAL',
                'description' => 'Aggressive illumination setups. LEDs, halos, and custom wiring looms built to withstand the elements and command attention.',
                'price' => 2500000,
                'icon' => 'zap',
                'image' => '/images/lighting_kit.jpg'
            ],
            [
                'number_code' => '02',
                'title' => 'PERFORMANCE TUNING',
                'slug' => 'performance-tuning',
                'category' => 'Performance',
                'tag' => 'TUNING',
                'description' => 'Dyno-tested calibrations, exhaust system integrations, and raw horsepower extraction.',
                'price' => 3500000,
                'icon' => 'gauge',
                'image' => '/images/tuning.jpg'
            ],
            [
                'number_code' => '03',
                'title' => 'METAL FABRICATION',
                'slug' => 'metal-fabrication',
                'category' => 'Custom Fabrication',
                'tag' => 'FABRICATION',
                'description' => 'Custom frames, sissy bars, and structural modifications welded with precision.',
                'price' => 4800000,
                'icon' => 'wrench',
                'image' => '/images/fabrication.jpg'
            ],
            [
                'number_code' => '04',
                'title' => 'HEAVY MAINTENANCE',
                'slug' => 'heavy-maintenance',
                'category' => 'Workshop',
                'tag' => 'ROUTINE',
                'description' => 'Fluid flushes, brake overhauls, and suspension rebuilds. Keeping the machine running lethal.',
                'price' => 1800000,
                'icon' => 'tool',
                'image' => '/images/maintenance.jpg'
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
