<?php

use Illuminate\Database\Seeder;

class Buildings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flats')->truncate();
        DB::table('buildings')->truncate();

        $newBarcode = new App\Http\Models\Barcode;

        factory(App\Http\Models\Building::class, 50)->create()
        ->each(function ($qr) use ($newBarcode) {

            $foundBarcode = $newBarcode->inRandomOrder()->whereNull('building_id')->first();
            $foundBarcode->building_id = $qr->id;
            $foundBarcode->barcodestatus_id = 1;
            $foundBarcode->save();

            factory(App\Http\Models\Flat::class, 5)->create([
               'building_id' => $qr->id
            ])->each(function($qr) {
                $customer = $qr->customers()
                    ->create(factory(App\Http\Models\Customer::class)->make()->toArray());
                $customer->user()->create(factory(App\Http\Models\User::class)
                    ->make()
                    ->setHidden([])
                    ->toArray());
                /*->each(function($qr) {
                    $qr->user()->save(factory(App\Http\Models\User::class)->make());
                });*/
            });
        });
    }
}
