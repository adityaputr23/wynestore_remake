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
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // e.g. Bobber, Cafe Racer, Scrambler
            $table->string('specs'); // e.g. 883cc V-Twin, Custom Loom
            $table->decimal('build_cost', 12, 2)->default(0);
            $table->string('status')->default('Completed');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // Lighting, Exhaust, CNC Parts
            $table->decimal('price', 12, 2);
            $table->integer('stock')->default(10);
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('garage_updates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->default('Wyne Customs Team');
            $table->string('date_str');
            $table->text('summary');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garage_updates');
        Schema::dropIfExists('products');
        Schema::dropIfExists('motorcycles');
    }
};
