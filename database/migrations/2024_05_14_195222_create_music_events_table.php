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
        Schema::table('music_events', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('place');
            $table->date('start_date');
            $table->foreignId('artist_id')->constrained('artists');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('music_events', function (Blueprint $table) {
            //
        });
    }
};
