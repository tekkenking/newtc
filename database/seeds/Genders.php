<?php

use Illuminate\Database\Seeder;

class Genders extends Seeder
{
    protected $table = 'genders';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $data = [
            ['name' => 'Male'],
            ['name' => 'Female']
        ];

        DB::table($this->table)->insert($data);
    }
}
