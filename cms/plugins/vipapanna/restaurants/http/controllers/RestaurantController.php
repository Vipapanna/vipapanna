<?php

namespace Vipapanna\Restaurants\Http\Controllers;

use Vipapanna\Restaurants\Http\Resources\RestaurantResource;
use Vipapanna\Restaurants\Models\Restaurant;
use Illuminate\Routing\Controller;
use function React\Promise\all;

class RestaurantController extends Controller{

    public function restaurantID($id){
        return RestaurantResource::make(Restaurant::findOrFail($id));
    }

    public function restaurants(){
        $featuredRestaurants = Restaurant::take(5)->get();
        $allRestaurants = Restaurant::skip(5)->take(PHP_INT_MAX)->get();

        return response()->json([
            'featured' => $featuredRestaurants,
            'all' => $allRestaurants
        ]);
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

