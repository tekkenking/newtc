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
        //'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numerify('080########'),
        'is_confirmed'  =>  1,
        'userstatus_id' => 1,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
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