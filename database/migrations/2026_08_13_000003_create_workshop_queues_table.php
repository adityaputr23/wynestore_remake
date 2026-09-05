<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workshop_queues', function (Blueprint $table) {
            $table->id();
            $table->string('queue_code');
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->nullOnDelete();
            $table->string('bike_name');
            $table->string('stage')->default('Inspection & Disassembly');
            $table->integer('progress_percent')->default(25);
            $table->string('mechanic_in_charge')->default('Wyne Customs Team');
            $table->string('estimated_completion')->default('Today, 17:00');
            $table->enum('status', ['queued', 'in_workshop', 'ready_for_pickup', 'completed'])->default('in_workshop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_queues');
    }
};
