<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provider_id'=> $this->provider_id,
            'person_name'=> $this->person_name,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'landline'=> $this->landline,
            'lng'=> $this->lng,
            'lat'=> $this->lat,
        ];
    }
}
