<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodSystemResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [ 'id' => $this->id,
        'Food_System_Name' => $this->food_system_name,
        'Total_Day_Calories' => $this->total_day_calories,
        'Meals_Number' => $this->meals_number,
        'For_Over_Weight' => $this->for_over_weight,
        'Food_System_Content' => $this->food_system_content,
        'created_at' => $this->created_at->format( 'd/m/Y' ),
        'updated_at' => $this->updated_at->format( 'd/m/Y' ), ];
    }
}
