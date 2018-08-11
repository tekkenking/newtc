<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Agency;

class Agencystaff extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lets first get the agencies
        $agenciesID_collection = Agency::all(['id']);

        foreach($agenciesID_collection as $id){
            factory(App\Http\Models\Agencystaff::class, 10)->create([
                'agency_id' => $id
            ])->each(function($qr) {
                $qr->user()->save(factory(App\Http\Models\User::class)->make([
                    'can_login' => 0
                ]));
            });;
        }

    }
}
