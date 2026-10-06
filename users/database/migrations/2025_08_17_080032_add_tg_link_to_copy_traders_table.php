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
        Schema::table('copy_traders', function (Blueprint $table) {
            $table->string('tgLink')->nullable()->after('tradersimg'); // Adds Telegram link after the image
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('copy_traders', function (Blueprint $table) {
            $table->dropColumn('tgLink');
        });
    }
};
