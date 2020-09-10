<?php

namespace App\Http\Resources;

use App\Models\Brochure;
use Illuminate\Http\Resources\Json\JsonResource;

class BrochureLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $related  = Brochure::PrioritySorted()->Active()->get();

        $image = null;
        if ($this->medias != null) {
            $image = asset($this->medias->first()->file);
        }

        return [
            'id' => $this->id,
            'image' => $image,
            'name' => $this->name,
            'download_link ' => $this->download_link,
            'days_remaining' => $this->day,
            'related' => new BrochureCollection($related)

        ];
    }
}
