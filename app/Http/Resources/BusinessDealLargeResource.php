<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BusinessDeal;

class BusinessDealLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $relatedBusinessDeals  = BusinessDeal::where('type', $this->type)->paginate(10);

        return [
            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->name,
            'price' => $this->price,                 //formate19/11/2019    in ui page 29
            'type' => $this->type,
            'related_business_deals' => new BusinessDealSmallCollection($relatedBusinessDeals),

        ];
    }
}
