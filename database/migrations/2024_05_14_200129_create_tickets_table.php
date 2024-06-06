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
        Schema::create('tickets', function (Blueprint $table) {

            // $table->id();
            $table->uuid('id')->primary();
            $table->foreignId('music_event_id');
            $table->foreignId('user_id')->nullable()->default(null);
            $table->foreignId('ticket_pool_id');
            $table->decimal('price', total: 8, places: 2);
            $table->boolean('reserved')->default(false);
            $table->string('qr_code_path')->nullable()->default(null);
            $table->foreignId('order_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
