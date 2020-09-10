<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrochureTinyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = null;
        if ($this->medias != null) {
            $image = asset($this->medias->first()->file);
        }

        return [
            // id
            // image
            // name
            // download link            //link will download by google chrome app
            // days remaining
            'id' => $this->id,
            'image' => $image,
            'name' => $this->name,
            'download_link ' => $this->download_link,
            'days_remaining' => $this->day,
        ];
    }
}
