<?php

namespace Vipapanna\Restaurants\Http\Controllers;

use Vipapanna\Restaurants\Http\Resources\RestaurantResource;
use Vipapanna\Restaurants\Models\Restaurant;
use Illuminate\Routing\Controller;

class RestaurantController extends Controller{

    public function restaurant($id){
        return RestaurantResource::make(Restaurant::findOrFail($id));
    }

}

