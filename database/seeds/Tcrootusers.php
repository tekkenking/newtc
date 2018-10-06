<?php

use Illuminate\Database\Seeder;

class Tcrootusers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tcrootusers')->truncate();

        $faker = Faker\Factory::create();

        factory(App\Http\Models\Tcrootuser::class, 5)->create()
            ->each(function($root) use ($faker) {
                $root->user()
                    ->save(factory(App\Http\Models\User::class)
                        ->make([
                            'username'  => $faker->userName
                        ]));
            });
    }
}
