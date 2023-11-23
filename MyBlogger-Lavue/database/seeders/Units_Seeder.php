<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Units_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //$table->id();
        // $table->string('Unit CODE')->unique();
        // $table->string('Unit Name', 64)->unique();

        $createMultipleUsers = [
            [
                'UNIT Code' => 'BAC2201',
                'UNIT Name' => 'ICT PROJECT YEAR 22',
                'Description' => ', the promotional poster for the 1978 horror film Piranha features an oversized piranha poised to bite the leg of an unsuspecting woman.',
                'Lecturer',
            ],
            [
                'UNIT Code' => 'BAC2202',
                'UNIT Name' => 'Financial Management 22',
                'Description' => 'This impression of piranhas is exacerbated by their mischaracterization in popular media.',
                'Lecturer',
            ],
            [
                'UNIT Code' => 'BAC2203',
                'UNIT Name' => 'Project Management',
                'Description' => 'Such a terrifying representation easily captures the imagination and promotes unnecessary fear..',
                'Lecturer',
            ],
            [
                'UNIT Code' => 'BAC2204',
                'UNIT Name' => 'Information Security',
                'Description' => 'Although most people consider piranhas to be quite dangerous, they are, d on large animals;',
                'Lecturer',
            ],
            [
                'UNIT Code' => 'BAC2205',
                'UNIT Name' => 'Mobile Programming',
                'Description' => '. Although most people consider piranhas to be quite dangerous, they are, for the most part, entirely harmless.',
                'Lecturer',
            ],
            [
                'UNIT Code' => 'BAC2206',
                'UNIT Name' => 'Java Programming',
                'Description' => 'hey eat smaller fish and aquatic plants. When confronted with humans, piranhas’ first instinct is to flee, not attack. .',
                'Lecturer',
            ],
            [
                'UNIT Code' => 'BAC2207',
                'UNIT Name' => 'Photography',
                'Description' => 'This impression of piranhas is exacerbated by their mischaracterization in popular media.',
                'Lecturer',
            ]
        ];

        DB::table('Units')->insert($createMultipleUsers);
    }
}
