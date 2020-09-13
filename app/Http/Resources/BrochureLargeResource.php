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
        $related  = Brochure::where('id', '!=', $this->id)->PrioritySorted()->Active()->get();

        $image = null;
        if ($this->medias != null) {
            $image = asset($this->medias->first()->file);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'attachment' => $this->attachment,
            'days_remaining' => $this->day,
            'created_at' => $this->created_at,
            'related' => new BrochureCollection($related)

        ];
    }
}
