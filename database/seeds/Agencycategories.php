<?php

use Illuminate\Database\Seeder;

class Agencycategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencycategories')->truncate();

        $data = [
            ['name' =>  'Trash',    'description'   =>  'Trash collection agency'],
            ['name' =>  'Tax',    'description'   =>  'Tax collection agency'],
            ['name' =>  'Water',    'description'   =>  'Waterboard distribution agency']
        ];

        DB::table('agencycategories')->insert($data);
    }
}
