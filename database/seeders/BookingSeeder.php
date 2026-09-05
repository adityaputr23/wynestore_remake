<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Service;
use App\Models\WorkshopQueue;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lightingService = Service::where('slug', 'custom-lighting-kits')->first();
        $tuningService = Service::where('slug', 'performance-tuning')->first();
        $fabricationService = Service::where('slug', 'metal-fabrication')->first();

        if ($lightingService && $tuningService) {
            $booking1 = Booking::create([
                'booking_code' => 'WYN-8821',
                'customer_name' => 'Aditya Pratama',
                'customer_email' => 'aditya@example.com',
                'customer_phone' => '081298765432',
                'motorcycle_model' => 'Harley Davidson Iron 883',
                'motorcycle_year' => '2022',
                'service_id' => $lightingService->id,
                'booking_date' => now()->format('Y-m-d'),
                'booking_time' => '10:00 AM',
                'notes' => 'Install RGB Halo LED with custom toggle switch.',
                'status' => 'in_progress',
            ]);

            WorkshopQueue::create([
                'queue_code' => 'BAY-01',
                'booking_id' => $booking1->id,
                'bike_name' => 'Harley Davidson Iron 883 (Aditya)',
                'stage' => 'Custom Wiring & Halo LED Mount',
                'progress_percent' => 75,
                'mechanic_in_charge' => 'Chief Mechanic Alex #KASIHPETIR',
                'estimated_completion' => 'Today, 16:30',
                'status' => 'in_workshop',
            ]);

            $booking2 = Booking::create([
                'booking_code' => 'WYN-9042',
                'customer_name' => 'Rizky Kurniawan',
                'customer_email' => 'rizky@example.com',
                'customer_phone' => '085711223344',
                'motorcycle_model' => 'Yamaha XSR 155 Scrambler',
                'motorcycle_year' => '2023',
                'service_id' => $tuningService->id,
                'booking_date' => now()->addDays(1)->format('Y-m-d'),
                'booking_time' => '02:00 PM',
                'notes' => 'Stage 2 ECU Remap and Full Exhaust Integration.',
                'status' => 'confirmed',
            ]);

            WorkshopQueue::create([
                'queue_code' => 'BAY-02',
                'booking_id' => $booking2->id,
                'bike_name' => 'Yamaha XSR 155 Custom (Rizky)',
                'stage' => 'Dyno Run & Calibration',
                'progress_percent' => 30,
                'mechanic_in_charge' => 'Tuning Specialist Danu',
                'estimated_completion' => 'Tomorrow, 14:00',
                'status' => 'in_workshop',
            ]);

            if ($fabricationService) {
                $booking3 = Booking::create([
                    'booking_code' => 'WYN-7619',
                    'customer_name' => 'Budi Santoso',
                    'customer_email' => 'budi@example.com',
                    'customer_phone' => '087899887766',
                    'motorcycle_model' => 'Kawasaki W175 Bobber',
                    'motorcycle_year' => '2021',
                    'service_id' => $fabricationService->id,
                    'booking_date' => now()->subDays(1)->format('Y-m-d'),
                    'booking_time' => '11:00 AM',
                    'notes' => 'Custom Hardtail frame fabrication & solo seat bracket.',
                    'status' => 'completed',
                ]);

                WorkshopQueue::create([
                    'queue_code' => 'BAY-03',
                    'booking_id' => $booking3->id,
                    'bike_name' => 'Kawasaki W175 Bobber (Budi)',
                    'stage' => 'Final Quality Control & Detailing',
                    'progress_percent' => 100,
                    'mechanic_in_charge' => 'Fab Lead Tommy',
                    'estimated_completion' => 'Ready for Pickup',
                    'status' => 'ready_for_pickup',
                ]);
            }
        }
    }
}
