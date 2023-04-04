<?php

namespace Vipapanna\Restaurants\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource{
    public function toArray($request)
    {
        return [
            'Food Name' => $this->foodName,
            'Description' => $this->description,
            'Values' => $this->values,
            'Link Wolt' => $this->linkWolt,
            'Link FoodPanda' => $this->linkFoodPanda,
            'Link Bistro' => $this->linkBistro,
            'Food Image' => $this->foodImage,
        ];
    }
}
