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

            //We create agency config
            $agency->agencyconfig()
                ->create(factory(App\Http\Models\Agencyconfig::class)->make()->toArray());

            $staff = $agency->agencystaffs()
                ->create(factory(App\Http\Models\Agencystaff::class)->make([
                'is_admin'  =>  1
            ])->toArray());

            //Creating agency staff users
            $staff->user()
                ->create(factory(App\Http\Models\User::class)
                    ->make()
                    ->setHidden([])
                    ->toArray());

            for($v=0; $v < $counter; $v++) {
                $agency->agencybillings()
                    ->create(factory(App\Http\Models\Agencybilling::class)->make()->toArray());
            }

            /**Lets register agency flats**/
            /*$ranCount = random_int(5, 20);

            for($k=0; $k < $ranCount; $k++) {
                $flat = $flatModel->inRandomOrder()->first();

                $agency->flats()->attach($flat->id, [
                    'accountid'         => strtoupper($faker->numerify('FL##########')),
                    'agency_balance'    => $this->_prepareDefaultCredit($agency, $flat)
                ]);

                $flat->agencybillings()
                    ->attach($agency->agencybillings()->inRandomOrder()->first()->id, [
                        'agent_id' => $agency->id
                    ]);

            }*/
        }

    }
}
