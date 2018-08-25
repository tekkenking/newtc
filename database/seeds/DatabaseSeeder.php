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
        $this->_dataSeed();
    }

    private function _dataSeed()
    {
        $this->call(Tcstaff::class);
        $this->call(Barcodes::class);
        $this->call(Customers::class);
        $this->call(Buildings::class);
        $this->call(Agencybillings::class);
        $this->call(Agencyconfigs::class);
        $this->call(Agencies::class);
        $this->call(Agencystaff::class);
        $this->call(Flats::class);
        //$this->call(Agencybillingarrears::class);
        //$this->call(Paymenthistories::class);
        //$this->call(Servicedhistories::class);
    }

    private function _systemDefaults()
    {
        $this->call(Users::class);
        $this->call(LocationsSeeder::class);
        $this->call(Banks::class);
        $this->call(Userstatuses::class);
        $this->call(Agencymodes::class);
        $this->call(Agencystatuses::class);
        $this->call(Agencycategories::class);
        $this->call(Buildingstatuses::class);
        $this->call(Buildingmodes::class);
        $this->call(Buildingtypes::class);
        $this->call(Buildingstructures::class);
        $this->call(Barcodestatuses::class);
        $this->call(Customertypes::class);
        $this->call(Genders::class);
        $this->call(Paymenttypes::class);
        $this->call(Servicestatuses::class);
    }
}
