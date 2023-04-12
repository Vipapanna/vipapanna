<?php

namespace Vipapanna\Restaurants\Http\Controllers;

use Vipapanna\Restaurants\Http\Resources\RestaurantResource;
use Vipapanna\Restaurants\Models\Restaurant;
use Illuminate\Routing\Controller;

class RestaurantController extends Controller{

    public function restaurantID($id){
        return RestaurantResource::make(Restaurant::findOrFail($id));
    }

    public function restaurant(){
        return RestaurantResource::collection(Restaurant::all());
    }
}

