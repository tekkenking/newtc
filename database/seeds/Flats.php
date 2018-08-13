<?php

use Illuminate\Database\Seeder;

class Flats extends Seeder
{
    protected $table = 'flats';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();
        DB::table('agency_flat')->truncate();
    }
}
