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
    public function restaurantSearch(){
        $search_text = input('query');
        $restaurants = Restaurant::where('restaurant_name', 'like', '%'.$search_text.'%')
            ->orWhere(function ($query) use ($search_text) {
                $query->whereHas('foods', function($q) use ($search_text) {
                    $q->where('food_name', 'like', '%'.$search_text.'%');
                });
            })
            ->get();

        return $restaurants;

    }
}

