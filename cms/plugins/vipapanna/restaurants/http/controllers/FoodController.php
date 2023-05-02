<?php

namespace Vipapanna\Restaurants\Http\Controllers;

use Vipapanna\Restaurants\Http\Resources\FoodResource;
use Vipapanna\Restaurants\Models\Food;
use Illuminate\Routing\Controller;
use GuzzleHttp\Client;

class FoodController extends Controller{

    public function food($food_id){
        return FoodResource::make(Food::findOrFail($food_id));
    }

    public function restaurantFoods($restuarnt_id) {
        $foods = Food::where('restaurant_id', $restuarnt_id)->get();

        return FoodResource::collection($foods);
    }

    public function createRequest($type, $uri) {
        $client = new Client();
        $res = $client->request($type, $uri);

        return $res;
    }

    public function test() {
        $this->createRequest("POST", "https://consumer-api.wolt.com/v1/pages/restaurants?lat=48.14427439713017&lon=17.1127243958451");
    }
}
