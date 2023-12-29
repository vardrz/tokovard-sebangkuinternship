<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // User
            [
                'name' => 'User Satu',
                'email' => 'user@mail.com',
                'password' => Hash::make('user'),
                'phone' => '08150021000',
                'status' => 'y',
                'level' => 'user',
            ],
            // Admin
            [
                'name' => 'Admin Vard',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
                'phone' => '08150021000',
                'status' => 'y',
                'level' => 'admin',
            ],
        ]);
    }
}
