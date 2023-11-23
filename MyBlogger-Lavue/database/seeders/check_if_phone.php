<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class check_if_phone extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersWithoutPhoneNumbers = User::whereNull('Phone-Number')->get();

        $faker = Factory::create();

        foreach ($usersWithoutPhoneNumbers as $user) {
            // Generate a random phone number
            $user->Contact= $faker->phoneNumber;
            // $user->phoneNumber = $faker->phoneNumber;
            $user->save();
        }
    }
}
