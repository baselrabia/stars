<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NeededTinyResource extends JsonResource
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
            // id
            // image
            // name
            // company name
            // country (name + flag)
            'id' => $this->id,
            'image'  => $this->image,
            'name' => $this->person_name,
            'company name ' => $this->provider->company_fullname,
            'country' => $this->location,
        ];
    }
}
