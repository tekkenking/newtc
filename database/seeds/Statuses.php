<?php

use Illuminate\Database\Seeder;

class Statuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->truncate();

        $data = [
            ['name' => 'success',   'description' => 'Success'],
            ['name' => 'fail',      'description' => 'Failed']
        ];

        DB::table('statuses')->insert($data);
    }
}
