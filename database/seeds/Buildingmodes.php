<?php

use Illuminate\Database\Seeder;

class Buildingmodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildingmodes')->truncate();

        $data = [
            ['name' =>  'Government'],
            ['name' =>  'Private']
        ];

        DB::table('buildingmodes')->insert($data);
    }
}
