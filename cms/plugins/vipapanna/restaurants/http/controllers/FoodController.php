<?php

namespace Vipapanna\Restaurants\Http\Controllers;

use Vipapanna\Restaurants\Http\Resources\FoodResource;
use Vipapanna\Restaurants\Http\Resources\RestaurantResource;
use Vipapanna\Restaurants\Models\Food;
use Illuminate\Routing\Controller;


class FoodController extends Controller{

    public function food($food_id){
        return FoodResource::make(Food::findOrFail($food_id));
    }

    public function foods(){
        $restaurant_id = Food::where('',);
    }
}
