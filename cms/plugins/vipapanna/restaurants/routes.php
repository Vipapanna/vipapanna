<?php
    use Vipapanna\Restaurants\Models\Restaurant;
    use Vipapanna\Restaurants\Models\Food;
    use Vipapanna\Restaurants\Http\Controllers\RestaurantController;

    Route::group(['prefix' => 'api/v1'], function (){

        Route::get('restaurant/{id}', [RestaurantController::class, 'restaurant']);
        Route::get('food/{food_id}', [\Vipapanna\Restaurants\Http\Controllers\FoodController::class, 'food']);
    });

