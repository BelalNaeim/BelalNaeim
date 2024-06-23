<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MoneyResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        $custom_url = 'http://blindassistant.coders-island.com/';
        return [ 'id' => $this->id,
        'moneyName' => $this->moneyName,
        'faceImage' => $custom_url.'public/'.( $this->faceImage ),
        'backImage' => $custom_url.'public/'.( $this->backImage ),
        'moneyNameVoice' => $custom_url.'public/'.( $this->moneyNameVoice ),
        'created_at' => $this->created_at->format( 'd/m/Y' ),
        'updated_at' => $this->updated_at->format( 'd/m/Y' ), ];
    }
}
