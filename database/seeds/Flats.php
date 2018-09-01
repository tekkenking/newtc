<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Flat;
use App\Http\Models\Agency;

class Flats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('agency_flat')->truncate();

        $flats = Flat::all();
        $faker = Faker\Factory::create();

        foreach($flats as $flat) {
            $ranCount = random_int(1, 20);

            $agencies = Agency::inRandomOrder()->take($ranCount)->get();
            //tt($agencies->toArray());

            foreach ($agencies as $agency) {
                $flat->agencies()->attach($agency->id, [
                    'accountid'         => strtoupper($faker->numerify('FL##########')),
                    'agency_balance'    => $this->_prepareDefaultCredit($agency, $flat)
                ]);


                $billingID = $agency->agencybillings()->inRandomOrder()->first()->id;
                $flat->agencybillings()
                    ->attach($billingID, [
                        'agent_id' => $agency->id
                    ]);

                $this->_generateFirstBill($flat, $agency, $billingID);
            }

        }
    }

    private function _prepareDefaultCredit($agency, $flat)
    {
        /*$tcagencyoptions = json_decode($agency->agencyconfig->tcagencyoptions);

        return (!$tcagencyoptions->immediatecharge)
            ? $flat->agencybilling($agency->id)->first()->amount
            : 0 - $flat->agencybilling($agency->id)->first()->amount;*/
        return 0.00;
    }

    private function _generateFirstBill($flat, $agency, $billingID)
    {
        $flat->agencybillingarrears()->create([
            'customer_id'       =>  $flat->customer[0]->id,
            'agencybilling_id'  =>  $billingID,
            'agency_id'         =>  $agency->id,
            //'amount'            =>  $currentFlatAgencyBillPackage->amount
        ]);
    }
}
