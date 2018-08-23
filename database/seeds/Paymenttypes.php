<?php

use Illuminate\Database\Seeder;

class Paymenttypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymenttypes')->truncate();

        $types = [
            [
                'name'  => 'Card',
                'description' => 'Payment though online with Credit, Debit or ATM cards'
            ],
            [
                'name'  => 'Bank',
                'description' => 'Payment by going to bank'
            ],
            [
                'name'  =>'USSD',
                'description'   => 'Payment using phone USSD code'
            ]
        ];

        DB::table('paymenttypes')->insert($types);
    }
}
