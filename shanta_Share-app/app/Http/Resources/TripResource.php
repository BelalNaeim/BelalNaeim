<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [ 'id' => $this->id,
        'Trip_User'     => $this->user()->select( 'full_name' )->get(),
        'Available_Weight' => $this->avwe,
        'From_Country' => $this->fromcount,
        'From_City' => $this->fromcity,
        'Travel_Date_Time' => $this->tdt->format( 'Y.m.d H:i:s' ),
        'To_Country' => $this->tocount,
        'To_City' => $this->tocity,
        'Arrive_Date_Time' => $this->adt->format( 'Y.m.d H:i:s' ),
        'created_at' => $this->created_at->format( 'Y.m.d H:i:s' ),
        'updated_at' => $this->updated_at->format( 'Y.m.d H:i:s' ), ];
    }
}
