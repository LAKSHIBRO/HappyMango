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
            $table->json('gallery_images')->nullable()->after('image');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null')->after('gallery_images');
            $table->integer('people_count')->nullable()->default(0)->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_packages', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('gallery_images');
            $table->dropColumn('category_id');
            $table->dropColumn('people_count');
        });
    }
};