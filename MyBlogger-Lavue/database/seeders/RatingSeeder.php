<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        $members = DB::table('users')->get();

        foreach ($members as $member) {

            $rating = $faker->randomFloat(1.0, 5.0, 1);

            DB::table('users')
            ->where('id', $member->id)
            ->update([
                'rating' => $rating,
            ]);
        }
    }
}
