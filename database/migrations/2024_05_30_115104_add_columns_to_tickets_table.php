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
        Schema::table('tickets', function (Blueprint $table) {
            //
            $table->foreignId('user_id')->nullable()->change();
            $table->string('pool_name')->nullable()->change();
            $table->string('qr_code_path')->nullable()->default(null);
            $table->foreignId('order_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable(false)->change();
            $table->string('pool_name')->nullable(false)->change();

            $table->dropColumn('qr_code_path');
            $table->dropForeign(['order_id']);
            $table->dropColumn('order_id');
        });
    }
};
