<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [
            'Name'=>$this->name,
            'Email'=>$this->email,
            'First_Name'=>$this->first_name,
            'Last_Name'=>$this->last_name,
            'Gender'=>$this->Gender,
            'Country'=>$this->country,
            'Govenment'=>$this->gov,
            'City'=>$this->city,
            'Age'=>$this->age,
            'Weight'=>$this->weight,
            'Height'=>$this->height,
            'Last_InBody_Date'=>$this->lindate,
            'Total_Body_Water'=>$this->tbw,
            'Protein'=>$this->prot,
            'mineral'=>$this->mineral,
            'Body_Fat_Mass'=>$this->bfmass,
            'Body_Weight'=>$this->bwei,
            'Body_Mass_Index'=>$this->bmi,
            'Percent_Body_Fat'=>$this->pbfat,
            'InBody_Score'=>$this->insco,
            'impedance'=>$this->impe,
            'Weigh_Control'=>$this->weco,
        ];
    }
}
