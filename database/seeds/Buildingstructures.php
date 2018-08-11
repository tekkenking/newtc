<?php

use Illuminate\Database\Seeder;

class Buildingstructures extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildingstructures')->truncate();

        $data = [
            ['name' =>  'Bungalow'],
            ['name' =>  'Duplex'],
            ['name' =>  'Upstairs']
        ];

        DB::table('buildingstructures')->insert($data);
    }
}
