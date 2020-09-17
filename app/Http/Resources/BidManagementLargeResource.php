<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BidManagementLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        foreach ($this->pivot() as $pivot) {
            $product =Product::where('id', $pivot->product_id)->first();
            $products[] =[
                        "product_id" => new ProductTinyResource($product),
                        "bid_management"=>[
                            "id" => $pivot->bid_management_id,
                            "quantities" => $pivot->quantities,
                            "price" => $pivot->price
                        ]
                    ];
        }

        return [
            'id' => $this->id,
            'provider' => $this->provider->id,
            'type' => $this->type,
            'payment_term' => $this->payment_term,
            'delivery_term' => $this->delivery_term,
            'delivery_date' => $this->delivery_date,
            'delivery_location' => $this->delivery_location,
            'note' => $this->note,
            'products' => $products
        ];
    }
}
