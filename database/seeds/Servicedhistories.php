<?php

use App\Http\Models\Agency;
use Illuminate\Database\Seeder;

class Servicedhistories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicedhistories')->truncate();

        //Lets get agencies to get theres staff to service the flats
        $agencies = Agency::active()->get(['id', 'agencystatus_id']);

        foreach ($agencies as $agency) {
            $agencystaff = $agency->agencystaffs()->inRandomOrder()->first();
            $this->_serviceCustomer($agencystaff);
        }
    }

    private function _serviceCustomer($agencystaff)
    {
        $agency = $agencystaff->agency;

        //Get flats with this agency
        $flats = $this->_agencyFlats($agency);

        foreach ($flats as $flat) {
            //Lets get current flat balance with this agency
            $currentFlatToAgencyBalance = $flat->agencies()
                ->where('agency_id', $agency->id)
                ->first()->pivot->agency_balance;

            //We get current plan of this flat with this agency
            $currentFlatAgencyBillPackage = $flat->agencybilling($agency->id)->first();

            //We check if this flat has enough balance for this service
            if($currentFlatToAgencyBalance < $currentFlatAgencyBillPackage->amount){
                //We prepare the error
            }

            $currentArrear = $this->_getFlatCurrentArrearForAgency($flat, $agency);
            $lastPaid = $this->_getFlatLastPaidForAgency($flat, $agency);
            $agencyConfig = $this->_getTcConfigAgency($agency);
            return $this->_chargeFlatOrNot($flat, $lastPaid, $agencyConfig)
                ? $this->_graceService($agencystaff, $flat) //Not charged
                : $this->_charge($agencystaff, $flat); //Charged
        }
    }

    private function _agencyFlats($agency)
    {
        return $agency->flats;
    }

    private function _getFlatCurrentArrearForAgency($flat, $agency)
    {
        $arrear = $flat->agencybillingarrears()
            ->where('agency_id', $agency->id)
            ->unpaids()
            ->first();
        //tt($arrear->toArray());
        return $arrear;
    }

    private function _getFlatLastPaidForAgency($flat, $agency)
    {
        $lastPaid = $flat->agencybillingarrears()
            ->where('agency_id', $agency->id)
            ->paids()
            ->latest('updated_at')
            ->first();
        //tt($lastPaid->toArray());
        return $lastPaid;
    }

    private function _getTcConfigAgency($agency)
    {
        $options = json_decode($agency->agencyconfig->tcagencyoptions);
        //tt($options->servicechargedays);
        return $options;
    }

    private function _chargeFlatOrNot($flat, $lastPaid, $agencyConfig)
    {
        //We first check if this customer is within grace window
            //To check grace window,
            // - We'll check the servicechargedays of this agency
            // - Then we check if the last paid date by this flat to today is less than servicechargedays
            // - If last paid date doesn't exist yet. It's like because the flat just got registered into the system. So we'll check by registered date of the flat
            //


        if(!$lastPaid){
            //We get the registered date of the flat
            $datetouse = $flat->created_at;
        }else{
            //Else we get the last paid date
            $datetouse = $lastPaid->created_at;
        }

        $diff = diff_in('days', $datetouse, sqldate());
        return ($diff < $agencyConfig->servicechargedays);

    }

    //We'll return grace service status
    public function _graceService($agencystaff, $flat)
    {
        //Registered
        $agencystaff->servicedhistories()
            ->create(factory(App\Http\Models\Servicedhistory::class)
                ->make([
                    'barcode_id'    =>  $flat->building->barcode[0]->id,
                    'agency_id' =>  $agencystaff->agency_id,
                    'flat_id'   =>  $flat->id,
                    'customer_id'   =>  $flat->custsomer[0]->id
        ])->toArray());
    }

    //We'll return either paid, not paid or paused service status
    public function _chargeService($agencystaff, $flat)
    {

        //has this customer paid
        //if(){

       // }

        //Registered
        $agencystaff->servicedhistories()
            ->create(factory(App\Http\Models\Servicedhistory::class)
                ->make([
                    //'amount'    =>  $flat->
                    'barcode_id'    =>  $flat->building->barcode[0]->id,
                    'agency_id' =>  $agencystaff->agency_id,
                    'flat_id'   =>  $flat->id,
                    'customer_id'   =>  $flat->custsomer[0]->id
                ])->toArray());
    }
}
