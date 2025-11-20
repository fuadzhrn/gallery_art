<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ubah user dengan email admin@test.com menjadi admin
        DB::table('users')
            ->where('email', 'admin@test.com')
            ->update(['role' => 'admin']);

        // Atau ubah semua user tertentu sekaligus
        // DB::table('users')
        //     ->whereIn('email', ['admin@test.com', 'admin2@test.com'])
        //     ->update(['role' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert: ubah kembali menjadi seniman
        DB::table('users')
            ->where('email', 'admin@test.com')
            ->update(['role' => 'seniman']);
    }
};
