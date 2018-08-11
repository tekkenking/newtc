<?php

use Illuminate\Database\Seeder;

class Agencymodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencymodes')->truncate();

        $data = [
            ['name' =>  'Government',    'description'   =>  'Government agency'],
            ['name' =>  'Private',    'description'   =>  'Private company agency'],
            ['name' =>  'Hybrid',    'description'   =>  'Joint venture between government and private investors'],
        ];

        DB::table('agencymodes')->insert($data);
    }
}
