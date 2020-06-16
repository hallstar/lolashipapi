<?php

use Illuminate\Database\Seeder;
use App\Models\Broker;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brokers = [
            [
                'name' => 'Mayberry Investments Limited', 
                'code' => '001'
            ],
            [
                'name' => 'Proven Wealth Limited', 
                'code' => '002'
            ],
            [
                'name' => 'NCB Capital Markets', 
                'code' => '009'
            ]
        ];
        
        foreach ($brokers as $value) 
        {
            Broker::firstOrCreate($value);
        }
    }
}
