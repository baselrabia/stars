<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProviderCollection extends ResourceCollection
{
    public $collects = ProviderTinyResource::class;
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
            'message' => __('successful')
        ];
    }
}
