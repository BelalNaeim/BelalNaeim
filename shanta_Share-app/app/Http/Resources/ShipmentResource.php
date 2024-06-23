<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        $custom_url = 'http://shantaShare.coders-island.com/';
        return [ 'id' => $this->id,
        'Shipment_User'     => $this->user()->select( 'full_name' )->get(),
        'Added_Date' => $this->adda->format( 'Y.m.d H:i:s' ),
        'From_Country' => $this->fromcount,
        'From_City' => $this->fromcity,
        'To_Country' => $this->tocount,
        'To_City' => $this->tocitys,
        'Shipment_Weight' => $this->shwe,
        'Need_Before_Date' => $this->ndbfda->format( 'Y.m.d H:i:s' ),
        'Product_Link' => $this->prlink,
        'Product_Name' => $this->prname,
        'Product_Type' => $this->prtype,
        'Product_Price' => $this->prprice,
        'Product_Quantity' => $this->prquan,
        'Product_Image' => $custom_url.'public/'.$this->primage,
        'Product_Details' => $this->prdet,
        'Deliver_Shipment_To'=>$this->dshto,
        'Address_To_Deliver_Shipment' => $this->atds,
        'created_at' => $this->created_at->format( 'Y.m.d H:i:s' ),
        'updated_at' => $this->updated_at->format( 'Y.m.d H:i:s' ), ];
    }
}
