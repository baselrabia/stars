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
        $relatedBrochures  = Brochure::where('provider_id', $this->provider_id)->paginate(10);

        return [
            'id' => $this->id,
            'image' => asset($this->medias->first()->file),
            'name' => $this->name,
            'download_link ' => $this->download_link,
            'days_remaining' => $this->day,
            'related_brochures' => new BrochureSmallCollection($relatedBrochures),

        ];
    }
}
