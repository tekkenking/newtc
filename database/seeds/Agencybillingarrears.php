<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Agencybillingarrear as arrears;
use App\Http\Models\Flat;

class Agencybillingarrears extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencybillingarrears')->truncate();

        //dd('stopped');

        $flats = $this->_getFlats();

        $this->_getEachFlatAgencies($flats);
    }

    private function _getFlats()
    {
        return $flats = Flat::all();
    }

    private function _getEachFlatAgencies($flatsObject)
    {
        foreach ($flatsObject as $flat) {
            $agencies = $flat->agencies;

            foreach ($agencies as $agency) {

                //Lets check agency status
                //dd($agency->pivot->status);
                if($agency->pivot->status !== 'active' ) {
                    continue;
                }

                //Lets check if this flat still has enough balance
                $currentFlatToAgencyBalance = $flat->agencies()
                    ->where('agency_id', $agency->id)
                    ->first()->pivot->agency_balance;

                $currentFlatAgencyBillPackage = $flat->agencybilling($agency->id)->first();

                if($currentFlatToAgencyBalance >= $currentFlatAgencyBillPackage->amount){
                    continue;
                }

                //Getting here means the agency is active and the flat is less or no balance

                //Lets list conditions to check before sending bills
                // - Is this agency the fixed billing type of agency
                $tcagencyoptions = json_decode($agency->agencyconfig->tcagencyoptions);

                //dd($tcagencyoptions->is_fixedbilling_agency);
                if($tcagencyoptions->is_fixedbilling_agency){

                    //Does this customer have bill in arrears table
                    $arrears = $flat->agencybillingarrears()
                        ->where('agency_id', $agency->id)
                        ->unpaids()
                        ->first();

                    //dd($arrears);

                    if(!$arrears){
                        //Then we generate bill
                        $this->_generateBill($flat, $agency, $currentFlatAgencyBillPackage);
                    }
                }

            }
        }
    }

    private function _generateBill($flat, $agency, $currentFlatAgencyBillPackage)
    {
        $flat->agencybillingarrears()->create([
            'customer_id'       =>  $flat->customer[0]->id,
            'agencybilling_id'  =>  $currentFlatAgencyBillPackage->id,
            'agency_id'         =>  $agency->id,
            //'amount'            =>  $currentFlatAgencyBillPackage->amount
        ]);

        //$this->_alsoUpdateAgencyFlatBalance($flat, $agency, $currentFlatAgencyBillPackage);
    }

    /*private function _alsoUpdateAgencyFlatBalance($flat, $agency, $currentFlatAgencyBillPackage)
    {
        $currentAgencyBalance = $flat->agencies()
            ->where('agency_id', $agency->id)
            ->first()->pivot->agency_balance;

        $agency->flats()
            ->updateExistingPivot($flat->id, [
                'agency_balance', $currentAgencyBalance - $currentFlatAgencyBillPackage->amount
            ]);
    }*/
}
