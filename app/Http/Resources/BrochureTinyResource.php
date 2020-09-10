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
            'name' => $this->name,
            'attachment' => $this->attachment,
            'days_remaining' => $this->day,
            'created_at' => $this->created_at,
        ];
    }
}
