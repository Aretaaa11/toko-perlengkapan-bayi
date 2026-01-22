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
        // First, update NULL values to 'user'
        DB::statement("UPDATE users SET role = 'user' WHERE role IS NULL");

        // Add 'user' as a valid ENUM value and set it as default
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'customer', 'user'])->default('user')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'customer'])->nullable()->change();
        });
    }
};
