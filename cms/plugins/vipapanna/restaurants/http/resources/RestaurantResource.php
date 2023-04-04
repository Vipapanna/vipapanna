<?php

namespace Vipapanna\Restaurants\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource{
    public function toArray($request)
    {
        return [
                    'Restaurant Name' => $this->restaurantName,
                    'Restaurant Image' => $this->restaurantImage,
               ];
    }
}
