<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'server_details' => $this->server_data,
            'created_at' => $this->created_at->format( 'd/m/Y' ),
            'updated_at' => $this->updated_at->format( 'd/m/Y' ),
        ];
    }
}
