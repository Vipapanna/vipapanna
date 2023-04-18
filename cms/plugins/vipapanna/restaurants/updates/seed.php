<?php namespace Vipapanna\Restaurants\Updates;

use Vipapanna\Restaurants\Models\Restaurant;
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
    }
}
