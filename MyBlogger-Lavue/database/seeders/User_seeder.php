<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use  \App\Models\User;
class User_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {

            DB::table('users')->insert([
                'name' => Str::random(4),
                'email' => Str::random(5) . '@gmail.com',
                'email_verified_at' => now()->format('Y-m-d'),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
