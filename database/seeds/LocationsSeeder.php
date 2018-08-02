<?php

use Illuminate\Database\Seeder;
//use Storage;

use App\Http\Models\State;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //We first truncate the lgas table
        DB::table('lgas')->truncate();
        //We then truncate states table
        DB::table('states')->truncate();

        //Then we insert state into state table and it's lgas into lgas table
        $json = file_get_contents(app_path('ngstatesandlgas.json'));
        $states = json_decode($json, true);

        //dd($json);
        $state_m = new State();
        foreach($states as $stateArr){
            $state = $stateArr['state'];
            //dd($state);
            //break;
           $created_state = $state_m->create([ 'name' => $state['name'] ]);
           foreach($state['locals'] as $lga) {
               $created_state->lgas()->create(['name' => $lga['name']]);
           }
           //dd($state);
           //break;
        }
    }
}