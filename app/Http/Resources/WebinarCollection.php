<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WebinarCollection extends ResourceCollection
{
    public $collects = WebinarTinyResource::class;
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
