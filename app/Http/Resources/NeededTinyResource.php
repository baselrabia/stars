<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NeededTinyResource extends JsonResource
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
        if ($this->medias->first()->file != null) {
            $image = asset($this->medias->first()->file);
        }

        return [
            // id
            // image
            // name
            // company name
            // country (name + flag)
            'id' => $this->id,
            'image' => $image,
            'name' => $this->name,
            'company name ' => $this->provider->company_fullname,
            'country' => $this->location,
        ];
    }
}
