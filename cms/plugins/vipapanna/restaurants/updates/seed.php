<?php namespace Vipapanna\Restaurants\Updates;

use Vipapanna\Restaurants\Models\Restaurant;
use Vipapanna\Restaurants\Models\Food;
use October\Rain\Database\Updates\Seeder;
use Faker;

class SeedAllTables extends Seeder{

    public function run(){
        $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++){

            Restaurant::create([
                'restaurant_name' => 'test',
                'review' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5),
                'address' => $faker->address,
                'restaurant_image_link' => $faker->imageUrl()
            ]);
        }


            for ($i = 0; $i < 100; $i++) {
                Food::create([
                    'restaurant_id' => $i + 1,
                    'food_name' => 'dummy',
                    'description' => 'Lorem ipsum dolor sit amet. Non quidem architecto in eligendi eligendi a voluptatem eveniet qui debitis neque.',
                    'link_wolt' => $faker->imageUrl(),
                    'link_foodpanda' => $faker->imageUrl(),
                    'link_bistro' => $faker->imageUrl(),
                    'price_wolt' => $faker->numberBetween($min = 1, $max = 100),
                    'price_foodpanda' => $faker->numberBetween($min = 1, $max = 100),
                    'price_bistro' => $faker->numberBetween($min = 1, $max = 100),
                    'food_image_link' => $faker->imageUrl()
                ]);
            }

    }
}
