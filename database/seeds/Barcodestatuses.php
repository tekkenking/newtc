<?php

use Illuminate\Database\Seeder;

class Barcodestatuses extends Seeder
{
    protected $table = 'barcodestatuses';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        $data = [
            ['name' => 'active'],
            ['name' => 'inactive'],
            ['name' => 'damaged']
        ];

        DB::table($this->table)->insert($data);
    }
}
