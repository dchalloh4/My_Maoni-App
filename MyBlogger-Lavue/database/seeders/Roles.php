<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $usersWithoutRole = User::whereNull('Role')->get();

        $faker = Factory::create();
        $role = ['LEC, STUD'];

        foreach ($usersWithoutRole as $user) {
            // Generate a random phone number
            $user->Role= $faker->randomElement($role);
            // $user->phoneNumber = $faker->phoneNumber;
            $user->save();
        }
    }
}
