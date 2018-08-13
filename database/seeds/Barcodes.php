<?php

use Illuminate\Database\Seeder;

class Barcodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barcodes')->truncate();
        factory(App\Http\Models\Barcode::class, 300)->create();
    }
}
