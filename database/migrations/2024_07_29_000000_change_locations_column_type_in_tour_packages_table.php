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
        Schema::table('tour_packages', function (Blueprint $table) {
            // Change a string column to text
            // Ensure the doctrine/dbal package is installed: composer require doctrine/dbal
            $table->text('locations')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_packages', function (Blueprint $table) {
            // Change a text column back to string (VARCHAR 255)
            $table->string('locations')->change();
        });
    }
};