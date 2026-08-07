<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            DB::statement('ALTER TABLE articles ALTER COLUMN thumbnail TYPE TEXT;');
        } catch (\Throwable $e) {
            try {
                Schema::table('articles', function (Blueprint $table) {
                    $table->text('thumbnail')->nullable()->change();
                });
            } catch (\Throwable $e2) {
                // Column change fallback
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            DB::statement('ALTER TABLE articles ALTER COLUMN thumbnail TYPE VARCHAR(255);');
        } catch (\Throwable $e) {
            Schema::table('articles', function (Blueprint $table) {
                $table->string('thumbnail', 255)->nullable()->change();
            });
        }
    }
};
