<?php

use Illuminate\Database\Seeder;

class Tcstaff extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tcstaffs')->truncate();

        $faker = Faker\Factory::create();

        factory(App\Http\Models\Tcstaff::class, 10)->create()
            ->each(function($tcstaff) use ($faker) {
            $tcstaff->user()
                ->save(factory(App\Http\Models\User::class)
                    ->make([
                        'username'  => $faker->userName
                    ]));
        });
    }
}
