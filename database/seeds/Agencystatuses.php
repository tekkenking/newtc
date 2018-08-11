<?php

use Illuminate\Database\Seeder;

class Agencystatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencystatuses')->truncate();

        $data = [
            ['name' =>  'Enabled'],
            ['name' =>  'Disabled']
        ];

        DB::table('agencystatuses')->insert($data);
    }
}
