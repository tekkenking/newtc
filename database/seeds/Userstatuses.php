<?php

use App\Http\Models\Userstatus;
use Illuminate\Database\Seeder;


class Userstatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userstatuses')->truncate();

        Userstatus::insert([
            ['name' => 'enabled'],
            ['name' => 'disabled']
        ]);
    }
}
