<?php

use Illuminate\Database\Seeder;

class Customertypes extends Seeder
{
    protected $table = 'customertypes';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $data = [
            ['name' => 'Landlord'],
            ['name' =>  'Tenant']
        ];

        DB::table($this->table)->insert($data);
    }
}
