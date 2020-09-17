<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        $provider = Auth::user()->provider;
        return $provider->quotation->where('id' , 10)->first()->providers;
        // return [
        //     'id' => $this->id,
        //     'provider' => new ProviderTinyResource($this->provider),
        //     'type' => $this->type,
        //     'payment_term' => $this->payment_term,
        //     'delivery_term' => $this->delivery_term,
        //     'delivery_date' => $this->delivery_date,
        //     'delivery_location' => $this->delivery_location,
        //     'note' => $this->note,
        //     'products' => new ProductCollection($this->products),
        // ];
    }
}
