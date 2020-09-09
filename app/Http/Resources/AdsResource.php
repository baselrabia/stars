<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
            // ad id
            // - ad image url
            // - ad type id            //type what
            // - ad product id        //product id to open
            // - ad market id id   //see excel "Constant/market id type"

            'id' => $this->id,
            'image' => asset($this->image) ,
            'type' => $this->location,

        ];
    }
}
