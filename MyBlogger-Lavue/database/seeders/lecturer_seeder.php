<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lecturer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        //
        foreach (range(1, 100) as $index) {

            $Contact = $faker->phoneNumber;
            $Contact = str_replace([' ', '-', '.', '(', ')'], '', $Contact);

            DB::table('Lecturers_DB')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'Phone-Number' => $Contact,
                // Add other columns and their values as needed
            ]);
        };
    }
}
