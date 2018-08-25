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
        $agencyConfig = $this->_getTcConfigAgency($agency);

        //Get flats with this agency
        $flats = $this->_agencyFlats($agency);

        foreach ($flats as $flat) {
            //Lets get current flat balance with this agency
            $currentFlatToAgencyBalance = $this->_getCurrentFlatAgencyBalance($agency, $flat);

            //We get current plan for the flat with this agency
            $currentFlatAgencyBillPackage = $flat->agencybilling($agency->id)->first();

            //We first have to get servicedhistory
            $servicedhistory = $this->_lastServiceHistory($agency, $flat);

            if(!$servicedhistory) {
                //This means this is the first time the flat is getting served attempt

                //We check if this flat has enough balance for this service
                if($currentFlatToAgencyBalance < $currentFlatAgencyBillPackage->amount){

                    //And we check if this flat has been serviced before
                    //if(!$this->_isFirstTimeService($agency, $flat)) {
                    //Then we prepare a failed service error due to payment
                    //We must charge this flat
                    $this->_chargeService(
                        $agencystaff,
                        $flat, 3,
                        $currentFlatAgencyBillPackage,
                        $currentFlatToAgencyBalance); //Not Charged, but return failed service
                    continue;
                    // }
                }else{
                    //We must charge this flat
                    $this->_chargeService(
                        $agencystaff,
                        $flat, 1,
                        $currentFlatAgencyBillPackage,
                        $currentFlatToAgencyBalance); //Charged, and return success service
                }
            }else{
                //Then we check the circle days of the agency against the last servicedhistory
                //We first get the distant in days from last service to now
                $daysDiff = diff_in('days', $servicedhistory->created_at, sqldate());

                //Then we'll check if the days is more than the agency days before service charge
                if($daysDiff > $agencyConfig->servicechargedays) {
                    //We must charge this flat
                    $this->_chargeService(
                        $agencystaff,
                        $flat, 1,
                        $currentFlatAgencyBillPackage,
                        $currentFlatToAgencyBalance); //Charged, and return success service
                }else{
                    $this->_graceService($agencystaff, $flat); //Not charged
                }
            }


            //Getting here means he has been serviced before
            //Then we check if this scan is grace period or require payment



            //To know this we check the last "servicechargestatus" if it's grace or payment

            /*if($servicedhistory->servicechargestatus_id == 1) {
                //If it's 1. It means it was charged
            }*/

            /*$currentArrear = $this->_getFlatCurrentArrearForAgency($flat, $agency);
            $lastPaid = $this->_getFlatLastPaidForAgency($flat, $agency);
            return $this->_chargeFlatOrNot($flat, $lastPaid, $agencyConfig)
                ? $this->_graceService($agencystaff, $flat) //Not charged
                : $this->_chargeService($agencystaff, $flat); //Charged*/
        }
    }

    private function _agencyFlats($agency)
    {
        return $agency->flats;
    }

    private function _getCurrentFlatAgencyBalance($agency, $flat)
    {
        //Lets check if this flat still has enough balance
        $currentFlatToAgencyBalance = $flat->agencies()
            ->where('agency_id', $agency->id)
            ->first()->pivot->agency_balance;
        return $currentFlatToAgencyBalance;
    }

    private function _isFirstTimeService($agency, $flat)
    {
        return $flat->servicedhistories()->where('agency_id', $agency->id)->first();
    }

    private function _lastServiceHistory($agency, $flat)
    {
        return $flat->servicedhistories()->where('agency_id', $agency->id)->latest()->first();
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
                    'customer_id'   =>  $flat->customer[0]->id,
                    'servicestatus_id'  => 2
        ])->toArray());
    }

    //We'll return either paid, not paid or paused service status
    public function _chargeService(
        $agencystaff,
        $flat,
        $servicestatus,
        $currentFlatAgencyBillPackage,
        $currentFlatToAgencyBalance)
    {
        $agency = $agencystaff->agency;

        //Registered
        $agencystaff->servicedhistories()
            ->create(factory(App\Http\Models\Servicedhistory::class)
                ->make([
                    'amount'        =>  $currentFlatAgencyBillPackage->amount,
                    'barcode_id'    =>  $flat->building->barcode[0]->id,
                    'agency_id'     =>  $agency->id,
                    'agencystaff_id'=>  $agencystaff->id,
                    'flat_id'       =>  $flat->id,
                    'customer_id'   =>  $flat->customer[0]->id,
                    'servicestatus_id'  => $servicestatus
                ])->toArray());

        $this->_updateFlatAgencyBalance(
            $flat,
            $agency,
            $currentFlatAgencyBillPackage);
    }

    private function _generateBill($flat, $agency, $currentFlatAgencyBillPackage)
    {
        $flat->agencybillingarrears()->create([
            'customer_id'       =>  $flat->customer[0]->id,
            'agencybilling_id'  =>  $currentFlatAgencyBillPackage->id,
            'agency_id'         =>  $agency->id
        ]);

        //$this->_alsoUpdateAgencyFlatBalance($flat, $agency, $currentFlatAgencyBillPackage);
    }

    private function _updateFlatAgencyBalance(
        $flat,
        $agency,
        $currentFlatAgencyBillPackage)
    {
        $bal = $flat->agencies()
                ->where('agency_id', $agency->id)
                ->first()
                ->pivot
                ->agency_balance - $currentFlatAgencyBillPackage->amount;

        $flat->agencies()
            ->updateExistingPivot($agency->id, [
                'agency_balance'=> $bal
            ]);

        if($bal <= 0) {
            $this->_generateBill($flat, $agency, $currentFlatAgencyBillPackage);
        }
    }
}
