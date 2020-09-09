<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductLargeResource extends JsonResource
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
            'name',
            'description',
            'category_id',
            'price_per_item',
            'price_lot_from',
            'price_lot_to',
            'minimum_order',
            'unit',
            'attachment',
            'video',
            'type',
            'available',
            'provider_id',
            'priority',
            'location',
            'status',
        ];
    }
}
