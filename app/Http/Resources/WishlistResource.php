<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class WishListResource extends JsonResource
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
            'product' => new ProductTinyResource($this->product),
            'user' => $this->user->name,
            'created_at' => $this->created_at,
        ];
    }
}
