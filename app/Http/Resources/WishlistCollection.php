<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class WishlistCollection extends ResourceCollection
{
    public $collects = WishlistResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'http_code' => 200,
            'data' => $this->collection,
            'count' => count(Auth::user()->wishlist),
            'message' => __('successful')
        ];
    }
}
