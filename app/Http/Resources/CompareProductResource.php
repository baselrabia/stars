<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Resources\Json\JsonResource;

class CompareProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $provider = Provider::whereId($this->provider_id)->firstOrFail();
        $category = Category::whereId($this->category_id)->firstOrFail();

        // dd($this->name);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'provider_id' => new ProviderTinyResource($provider),
            'category_id' => new CategoryTinyResource($category),
            'product_attributes' => new ProductAttributesResource($this->productAttribute),
            'price_per_item' => $this->price_per_item,
            'price_lot_from' => $this->price_lot_from,
            'price_lot_to' => $this->price_lot_to,
            'minimum_order' => $this->minimum_order,
            'unit' => $this->unit,
            'attachment' => $this->attachment,
            'type' => $this->type,
        ];
    }
}
