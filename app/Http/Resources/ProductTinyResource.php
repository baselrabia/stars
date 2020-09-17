<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTinyResource extends JsonResource
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
            // category id
            // subcategory id
            // image (single image )
            // is favoirt         //to my user id
            // price after
            // price before discount
            // provider id          //i want
            // provider name
            // provider image
            // brand id
            // brand name   //see page cart list
            // country name
            // country flag image    //the flag of country image url
            // is featured product.     //boolean value. >> in home page return featured product
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->id,
            'price_per_item' => $this->price_per_item,
            'price_lot_from' => $this->price_lot_from,
            'price_lot_to' => $this->price_lot_to,
            'minimum_order' => $this->minimum_order,
            'unit' => $this->unit,
            'attachment' => $this->attachment,
            'video' => $this->video,
            'type' => $this->type,
            'available' => $this->available,
            'provider_id' => $this->provider_id,
            'location' => $this->location,
            // 'quantity' =>  $this->quotations() ? $this->quotations()->where('product_id', $this->id)->first()->pivot->quantities : null ,
            // 'bidsManagement-price' =>  $this->bidmanagements() ? $this->bidmanagements()->where('product_id', $this->id)->first()->pivot->price : null,

        ];
    }
}
