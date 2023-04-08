<?php

namespace Vipapanna\Restaurants\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'food_name' => $this->food_name,
            'description' => $this->description,
            'values' => $this->values,
            'link_wolt' => $this->link_wolt,
            'link_foodpanda' => $this->link_foodpanda,
            'link_bistro' => $this->link_bistro,
            'price_wolt'=> $this->price_wolt,
            'price_foodpanda'=> $this->price_foodpanda,
            'price_bistro'=> $this->price_bistro,
            'food_image_link' => $this->food_image_link,
        ];
    }
}
