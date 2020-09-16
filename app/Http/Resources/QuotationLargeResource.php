<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotationLargeResource extends JsonResource
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
            'id' => $this->id,
            'provider' => new ProviderTinyResource($this->provider),
            'type' => $this->type,
            'payment_term' => $this->payment_term,
            'delivery_term' => $this->delivery_term,
            'delivery_date' => $this->delivery_date,
            'delivery_location' => $this->delivery_location,
            'note' => $this->note,
            'attachment' => $this->attachment ? asset($this->attachment) : $this->attachment,
        ];
    }
}
