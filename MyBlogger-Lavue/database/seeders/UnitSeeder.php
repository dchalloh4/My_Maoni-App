<?php

namespace Database\Seeders;

use App\Models\Units;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\Units::factory(7)->create();

        $createMultipleUnits = [
            [
                'UNIT Code' => 'BAC2201',
                'UNIT Name' => 'ICT PROJECT YEAR 22',
                'Description' => 'The promotional poster for the 1978 horror film Piranha features an oversized piranha poised to bite the leg of an unsuspecting woman.',
            ],
            [
                'UNIT Code' => 'BAC2202',
                'UNIT Name' => 'Financial Management 22',
                'Description' => 'This impression of piranhas is exacerbated by their mischaracterization in popular media.',
            ],
            [
                'UNIT Code' => 'BAC2203',
                'UNIT Name' => 'Project Management',
                'Description' => 'Such a terrifying representation easily captures the imagination and promotes unnecessary fear..',
            ],
            [
                'UNIT Code' => 'BAC2204',
                'UNIT Name' => 'Information Security',
                'Description' => 'Although most people consider piranhas to be quite dangerous, they are, d on large animals;',
            ],
            [
                'UNIT Code' => 'BAC2205',
                'UNIT Name' => 'Mobile Programming',
                'Description' => '. Although most people consider piranhas to be quite dangerous, they are, for the most part, entirely harmless.',
            ],
            [
                'UNIT Code' => 'BAC2206',
                'UNIT Name' => 'Java Programming',
                'Description' => 'hey eat smaller fish and aquatic plants. When confronted with humans, piranhas’ first instinct is to flee, not attack. .',
            ],
            [
                'UNIT Code' => 'BAC2207',
                'UNIT Name' => 'Photography',
                'Description' => 'This impression of piranhas is exacerbated by their mischaracterization in popular media.',
            ]
        ];

        Units::insert($createMultipleUnits);
        // DB::table('Units')->insert($createMultipleUnits);
    }
}
