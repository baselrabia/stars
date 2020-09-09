<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrochureSmallResource extends JsonResource
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
            // id
            // image
            // name
            // download link            //link will download by google chrome app
            // days remaining
            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->name,
            'download_link ' => $this->download_link,
            'days_remaining' => $this->day,
        ];
    }
}
