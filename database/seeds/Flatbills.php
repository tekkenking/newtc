<?php

use Illuminate\Database\Seeder;

class Flatbills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flatbills')->truncate();
    }
}
