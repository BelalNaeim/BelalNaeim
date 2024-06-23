<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [ 'id' => $this->id,
        'From_UserName' => $this->fromusername,
        'To_UserName' => $this->tousername,
        'Gender' => $this->mdt->format( 'Y.m.d H:i:s' ),
        'Age' => $this->mcontent,
        'created_at' => $this->created_at->format( 'd/m/Y' ),
        'updated_at' => $this->updated_at->format( 'd/m/Y' ), ];
    }
}
