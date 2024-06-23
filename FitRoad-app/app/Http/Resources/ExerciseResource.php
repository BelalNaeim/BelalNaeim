<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [ 'id' => $this->id,
        'ExerciseName' => $this->exercise_name,
        'Duration' => $this->Duration,
        'Burned_Calories' => $this->burned_calories,
        'For_Over_Weight' => $this->for_over_weight,
        'Target_Body_Area' => $this->target_body_area,
        'Exercise_Video' => 'public/'.( $this->exercise_video ),
        'created_at' => $this->created_at->format( 'd/m/Y' ),
        'updated_at' => $this->updated_at->format( 'd/m/Y' ),
       ];
    }
}
