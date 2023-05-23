<?php

use Vipapanna\Restaurants\Models\Restaurant;
use Vipapanna\Restaurants\Models\Food;
use Vipapanna\Restaurants\Http\Controllers\RestaurantController;
use Vipapanna\Restaurants\Http\Controllers\FoodController;

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('restaurant/search', [RestaurantController::class, 'restaurantSearch']);
    Route::get('restaurant/{id}', [RestaurantController::class, 'restaurantID']);
    Route::get('restaurants', [RestaurantController::class, 'restaurant']);
    Route::get('food/{food_id}', [FoodController::class, 'food']);
    Route::get('restaurant/food/{restaurant_id}', [FoodController::class, 'restaurantFoods']);
});

