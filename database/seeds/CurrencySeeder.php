<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Currency::firstOrCreate([
            'name'      => 'Jamaican Dollars',
            'code'      => 'JMD',
            'symbol'    => '$',
            'precision' => 2,
            'template'  => null
        ], [
            'name'      => 'United State Dollars',
            'code'      => 'USD',
            'symbol'    => '$',
            'precision' => 2,
            'template'  => null
        ]);
    }
}
