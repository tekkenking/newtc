<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Bank;
use App\Http\Models\Agency;

class Agencies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencystaffs')->truncate();
        DB::table('agencies')->truncate();

        $counter = 10;

        for($i=0; $i <= $counter; $i++) {
            $agency = factory(App\Http\Models\Agency::class)->create([
                'bank_id'   => Bank::inRandomOrder()->first()->id
            ]);

            $staff = $agency->agencystaffs()
                ->create(factory(App\Http\Models\Agencystaff::class)->make([
                'is_admin'  =>  1
            ])->toArray());

            $staff->user()
                ->create(factory(App\Http\Models\User::class)
                    ->make()
                    ->setHidden([])
                    ->toArray());

            for($v=0; $v < $counter; $v++) {
                $agency->flatbills()
                    ->create(factory(App\Http\Models\Flatbill::class)->make()->toArray());
            }

        }

    }
}
