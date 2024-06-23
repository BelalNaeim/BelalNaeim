<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainerResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [ 'id' => $this->id,
        'Name' => $this->FullName,
        'Phone_Number' => $this->mobile_number,
        'Gender' => $this->Gender,
        'Age' => $this->Age,
        'Exercise_Specialties' => $this->Exercise_specialties,
        'start_work_date' => $this->created_at->format( 'd/m/Y' ),
        'created_at' => $this->created_at->format( 'd/m/Y' ),
        'updated_at' => $this->updated_at->format( 'd/m/Y' ), ];
    }
}
