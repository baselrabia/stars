<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributesResource extends JsonResource
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
            'brand'=> $this->brand,
            'size'=> $this->size,
            'shape'=> $this->shape,
            'product_id'=> $this->product_id,
            'unit_length'=> $this->unit_length,
            'number_of_certificates'=> $this->number_of_certificates,
            'payment_term'=> $this->payment_term,
            'delivery_term'=> $this->delivery_term,
            'delivery_date'=> $this->delivery_date,
            'delivery_location'=> $this->delivery_location,
            'shipment_location'=> $this->shipment_location,
            'place_of_origin'=> $this->place_of_origin,
            'in_stock'=> $this->in_stock,
        ];
    }
}
