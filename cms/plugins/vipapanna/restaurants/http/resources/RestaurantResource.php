<?php

namespace Vipapanna\Restaurants\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'restaurant_name' => $this->restaurant_name,
            'restaurant_image_link' => $this->restaurant_image_link,
            'review' => $this->review,
            'address'=> $this->address,
        ];
    }
}
