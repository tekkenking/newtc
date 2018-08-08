<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->_systemDefaults();
        // $this->call(UsersTableSeeder::class);
        $this->call(Tcstaff::class);
        $this->call(Agencies::class);
    }

    private function _systemDefaults()
    {
        $this->call(LocationsSeeder::class);
        $this->call(Banks::class);
        $this->call(Userstatuses::class);
        $this->call(Agencymodes::class);
        $this->call(Agencystatuses::class);
        $this->call(Agencycategories::class);
    }
}
