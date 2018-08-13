<?php

use Illuminate\Database\Seeder;

class Customers extends Seeder
{
    protected $table = 'customers';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();
        DB::table('customer_flat')->truncate();
    }
}
