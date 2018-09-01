<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Agencybillingarrear;
use App\Http\Models\Paymenthistory;


class Paymenthistories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymenthistories')->truncate();

        //dd('stopped');

        $this->_makePaymentAndKeepHistories();

        /*$allFlats = Flat::all();

        foreach ($allFlats as $flat) {
            //Lets get all the agencies
            $totalamount = $flat->agencybillings->sum('amount');
            //dd($totalamount);
                //->sum('amount');
            if($totalamount <= 0) {
                continue;
            }

            $customer_id = $flat->customer[0]->id;
            //dd($customer_id);

            $data = factory(\App\Http\Models\Paymenthistory::class)->make([
                'customer_id'   =>  $customer_id,
                'amount'        =>  $totalamount
            ])->toArray();

            $flat->paymenthistories()->create($data);
        }*/

        //factory(\App\Http\Models\Paymenthistory::class)->create();
    }

    private function _makePaymentAndKeepHistories()
    {
        $unpaids = Agencybillingarrear::unpaids()->get();

        foreach ($unpaids as $unpaid) {
            $unpaidAmount = $unpaid->agencybilling->amount - $unpaid->discounted_amount;
            $flat_id = $unpaid->flat_id;
            $customer_id = $unpaid->customer_id;

            $data = factory(\App\Http\Models\Paymenthistory::class)->make([
                'customer_id'   =>  $customer_id,
                'amount'        =>  $unpaidAmount,
                'flat_id'       =>  $flat_id
            ])->toArray();

            $paymenthistory = Paymenthistory::create($data);

            $this->_updateAgencyBillingArrear($unpaid, $paymenthistory);

            $this->_updateFlatAgencyBalance($unpaid);
        }
    }

    private function _updateAgencyBillingArrear($unpaid, $paymenthistory)
    {
        $unpaid->paid_date = now();
        $unpaid->paymenthistory_id = $paymenthistory->id;
        $unpaid->save();
    }

    private function _updateFlatAgencyBalance($unpaid)
    {
        $unpaid->flat->agencies()
            ->updateExistingPivot($unpaid->agency_id, [
                'agency_balance'=> $unpaid->agencybilling->amount
            ]);
    }
}
