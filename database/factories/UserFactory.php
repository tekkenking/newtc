<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Http\Models\User::class, function (Faker $faker) {
    return [
        'gender_id' => random_int(1,2),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numerify('080########'),
        'is_confirmed'  =>  1,
        'userstatus_id' => 1,
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Http\Models\Tcstaff::class, function (Faker $faker) {
    return [
        'lga_id'    =>  $faker->numberBetween(1, 600),
        'name'      =>  $faker->name(),
        'address'   =>  $faker->address
    ];
});

$factory->define(App\Http\Models\Agency::class, function(Faker $faker) {
    return [
        //'bank_id'           =>  $faker->numberBetween(1,15),
        'agencystatus_id'   =>  1,
        'agencycategory_id' =>  $faker->numberBetween(1,3),
        'agencymode_id'     =>  $faker->numberBetween(1,3),
        'lga_id'            =>  $faker->numberBetween(1, 600),
        'tcstaff_id'        =>  $faker->numberBetween(1,10),
        'name'              =>  $faker->name(),
        'email'             =>  $faker->unique()->safeEmail,
        'phone'             =>  $faker->numerify('080########'),
        'alt_phone'         =>  $faker->numerify('080########'),
        'address'           =>  $faker->address,
        'token'             =>  generate_token(8, new App\Http\Models\Agency),
        'bank_account_number'=> $faker->numerify('##########'),
        'bank_account_name' => $faker->name,
        'bank_bvn'          => $faker->numerify('#########'),
        //'is_scanning_agent' => random_int(0,1),
        'description'       =>  $faker->sentence
    ];
});

$factory->define(App\Http\Models\Agencystaff::class, function (Faker $faker) {
    return [
        'agencystatus_id'   =>  1,
        'lga_id'    =>  $faker->numberBetween(1, 600),
        'fullname'  =>  $faker->name(),
        'alt_phone' =>  $faker->numerify('080########'),
        'token'     =>  generate_token(8, new App\Http\Models\Agencystaff())
    ];
});

$factory->define(\App\Http\Models\Agencybilling::class, function(Faker $faker) {
    return [
        'agencystatus_id'   =>  random_int(1,2),
        'name'              =>  $faker->firstName,
        'amount'            =>  $faker->numerify('###00'),
        'pending_amount'    =>  '0.00',
        'description'       =>  $faker->sentence
    ];
});

$factory->define(App\Http\Models\Barcode::class, function () {
    return [
        'barcodestatus_id'  => 2,
        'code'              => generate_token(8, [new App\Http\Models\Barcode(), 'code'])
    ];
});

$factory->define(App\Http\Models\Building::class, function (Faker $faker) {
    return [
        'buildingstatus_id' => random_int(1,3),
        'buildingmode_id' => random_int(1,2),
        'buildingtype_id' => random_int(1,6),
        'buildingstructure_id' => random_int(1,3),
        'lga_id'        => $faker->numberBetween(1, 600),
        'address'       => $faker->address,
        'lng'           => $faker->longitude,
        'lat'           => $faker->latitude
    ];
});

$factory->define(App\Http\Models\Flat::class, function (Faker $faker) {
    return [
        'name'  =>  $faker->firstName,
        'rooms' =>  random_int(1,100),
        'master_accountid' => strtoupper($faker->numerify('TC############'))
    ];
});

$factory->define(App\Http\Models\Customer::class, function (Faker $faker) {
    return [
        'customertype_id'   =>  random_int(1,2),
        'fullname'  =>  $faker->name,
        'alt_phone' => $faker->numerify('080########'),
        'configs'   =>  json_encode(['balancefloatable' => true])
    ];
});

$factory->define(App\Http\Models\Paymenthistory::class, function () {
    return [
        'paymenttype_id'    =>  random_int(1,3),
        'transaction_ref'   => generate_token(15, [new \App\Http\Models\Paymenthistory(), 'transaction_ref']),
        'status'            =>  random_int(0,1),
    ];
});


$factory->define(App\Http\Models\Agencyconfig::class, function () {
    return [
        'tcagencyoptions'   =>  json_encode([
            'servicecomment'                =>  'serviced you',
            'showcustomeremail'             =>  false,
            'showcustomerpaymenthistory'    =>  true,
            'showcustomerphonenumber'       =>  true,
            'showcustomeraddress'           =>  true,
            'is_scanning_agency'            =>  true,
            'is_fixedbilling_agency'        =>  true,
            'servicechargedays'             =>  28,
            'daysbeforegeneratebill'        =>  21,
            'immediatecharge'               =>  true, //If true then the customer would pay before he/she can be serviced
        ]),

        'agencyoptions'     =>  json_encode([
            'temploginlifedays' =>  7
        ]),
    ];
});

$factory->define(App\Http\Models\Servicedhistory::class, function (Faker $faker) {
    return [
        'servicestatus_id'  =>  random_int(1,3),
        'lng'   =>  $faker->longitude,
        'lat'   =>  $faker->latitude,
    ];
});
