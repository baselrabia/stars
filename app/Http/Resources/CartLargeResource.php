<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Resources\Json\JsonResource;

class CartLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $product = Product::whereId($this->product_id)->first();
        $provider = Provider::whereId($this->provider_id)->first();
        return [
            'product' => new ProductTinyResource($product),
            'provider' => new ProviderTinyResource($provider),
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
        ];
    }
}
