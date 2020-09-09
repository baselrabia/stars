<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessDealSmallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $type = ['tender', 'auction', 'project'];
        return [

            // id
            // image
            // name
            // price per ton (with currency ex: 48$ )
            // type id of business deals //see "Sheet/constant"

            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->name,
            'price' => $this->price,                 //formate19/11/2019    in ui page 29
            'type' => $this->type,

            // 'image' => $this->medias->file,

        ];
    }
}
