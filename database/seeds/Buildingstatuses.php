<?php

use Illuminate\Database\Seeder;

class Buildingstatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildingstatuses')->truncate();

        $data = [
            ['name' =>  'Occupied'],
            ['name' =>  'Vacant'],
            ['name' =>  'Undeveloped']
        ];

        DB::table('buildingstatuses')->insert($data);
    }
}
