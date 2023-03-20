<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'ahmed gamal',
            'email' => 'ahmed@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'role_id' => 1, // 1 admin
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'mohammed gamal',
            'email' => 'mohammed@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'role_id' => 1, // 1 admin
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'emad gamal',
            'email' => 'emad@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'role_id' => 1, // 1 admin
        ]);
    }
}
