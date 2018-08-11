<?php

use Illuminate\Database\Seeder;

class Buildings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->truncate();

    }
}
