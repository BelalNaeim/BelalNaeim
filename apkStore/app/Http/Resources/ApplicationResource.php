<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        return [
            'id' => $this->id,
            'application_name' => $this->app_name,
            'serverNo' => $this->server_id,
            'appplication_version' => $this->app_version,
            'logo' => $this->logo,
            'application_file' => $this->apk_file,
            'appplication_Link' => $this->app_link,
            'screenshots	' => $this->screenshots	,
            'app_information' => $this->app_info,
            'uniqueID'=>$this->uuid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
