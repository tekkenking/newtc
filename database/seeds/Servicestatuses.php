<?php

use Illuminate\Database\Seeder;

class Servicestatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicestatuses')->truncate();

        $data = [
            ['name' => 'success',   'description' => 'Paid'],
            ['name' => 'grace',   'description'   => 'Grace'],
            ['name' => 'fail',      'description' => 'Not Paid'],
            ['name' => 'paused',    'description' => 'Paused']
        ];

        DB::table('servicestatuses')->insert($data);
    }
}
