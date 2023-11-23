<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            // Generate a random phone number with only digits
            $Contact = $faker->phoneNumber; // Adjust the number of digits as needed
            // $Contact = str_replace([' ', '-', '.', '(', ')'], '', $Contact);

            DB::table('Lecturers_DB')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'Contact' => $Contact,
                // Add other columns and their values as needed
            ]);
    }
}
}
