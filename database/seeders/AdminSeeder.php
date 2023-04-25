<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Admin Tertinggi',
            'username' => 'admin',
            'password' => Hash::make("admin1234567890"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
