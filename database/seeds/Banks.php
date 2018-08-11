<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Bank;

class Banks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->truncate();

        $json = file_get_contents(app_path('banks.json'));
        $banks = json_decode($json);

        foreach ($banks as $bank) {
            Bank::create([ 'name' => $bank->name]);
        }
    }
}
