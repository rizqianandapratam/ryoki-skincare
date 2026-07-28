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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('rating', 2, 1)->default(0)->after('image');
            $table->unsignedInteger('stock')->default(0)->after('rating');
            $table->boolean('is_featured')->default(false)->after('is_best_seller');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['rating', 'stock', 'is_featured']);
        });
    }
};
