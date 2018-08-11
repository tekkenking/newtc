<?php

use Illuminate\Database\Seeder;

class Buildingtypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildingtypes')->truncate();

        $data = [
            ['name' =>  'Residential'],
            ['name' =>  'Hotel'],
            ['name' =>  'School'],
            ['name' =>  'Hospital'],
            ['name' =>  'Police station'],
            ['name' =>  'Other commercial']
        ];

        DB::table('buildingtypes')->insert($data);
    }
}
