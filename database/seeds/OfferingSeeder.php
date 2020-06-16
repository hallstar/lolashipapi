<?php

use Illuminate\Database\Seeder;
use App\Models\OfferFee;
use App\Models\Currency;
use App\Models\Broker;
use App\Models\Offer;
use App\Constants\OfferType;
use App\Constants\OfferStatus;
use App\Constants\MarketType;
use App\Constants\FeeType;

use Faker\Factory as Faker;

class OfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!Offer::count())
        {
            
            $faker = Faker::create();

            $arr = [[
                'closing_date'  => '2020-07-31 16:30:00',
                'opening_date'  => '2020-06-01 08:00:00',
                'status'        => OfferStatus::PREOPEN,
                'prefix'        => 'OFFA'
            ], [
                'closing_date'  => '2020-07-31 16:30:00',
                'opening_date'  => '2020-05-01 08:00:00',
                'status'        => OfferStatus::OPEN,
                'prefix'        => 'OFFB'
            ], [
                'closing_date'  => '2020-05-30 16:30:00',
                'opening_date'  => '2020-03-01 08:00:00',
                'status'        => OfferStatus::CLOSED,
                'prefix'        => 'OFFC'
            ]];

            foreach ($arr as $index => $value) 
            {
                $company    = $faker->company;
                $digit      = $faker->numberBetween(1, 9);

                $offering = Offer::updateOrCreate([ 
                    'prefix'            => $arr[$index]['prefix'],
                    'broker_id'         => Broker::inRandomOrder()->first()->id,
                    'currency_id'       => Currency::inRandomOrder()->first()->id,
                    'title'             => $company,
                    'type'              => OfferType::$methods[array_rand(OfferType::$methods)],
                    'market_type'       => MarketType::$methods[array_rand(MarketType::$methods)]
                ], [
                    'short_name'        => $company,
                    'description'       => $faker->text(),
                    'status'            => $arr[$index]['status'],
                    'opening_date'      => date("Y-m-d H:i:s", strtotime($arr[$index]['opening_date'])),
                    'closing_date'      => date("Y-m-d H:i:s", strtotime($arr[$index]['closing_date'])),
                    'unit_price'        => 2.5,
                    'minimum'           => 1000,
                    'maximum'           => $digit * 1000000,
                    'available'         => $digit * 1000000,
                    'increment_size'    => $digit * 100,
                    'published'         => true,
                    'logo'              => $faker->imageUrl(),
                    'thumbnail_logo'    => null,
                    'link'              => $faker->url,
                    'research_link'     => $faker->url,
                ]);

                $fees = ['Processing Fee', 'Service Charge', 'Broker Fee', 'GCT', 'Tax'];

                OfferFee::updateOrCreate([ 
                    'name'              => $fees[array_rand($fees)],
                    'offer_id'          => $offering->id,
                ], [
                    'amount'            => $faker->numberBetween(1, 100),
                    'type'              => FeeType::$methods[array_rand(FeeType::$methods)]
                ]);
            }
        }
    }
}
