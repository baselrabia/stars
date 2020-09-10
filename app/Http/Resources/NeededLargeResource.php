<?php

namespace App\Http\Resources;

use App\Models\Needed;
use Illuminate\Http\Resources\Json\JsonResource;

class NeededLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $related = Needed::where('type', $this->type)->PrioritySorted()->Active()->get();


        return [
            // id
            // image
            // name
            // company name
            // country (name + flag)
            // summery  array  string
            // requirements array  string
            // MContact of  agent
            // MProvider small
            // array of related Agents model small

            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->person_name,
            'company name ' => $this->provider->company_fullname,
            'country' => $this->location,
            'summery' => $this->summary,
            'requirements' => $this->requirements,
            // MContact of  agent
            'Provider' => new ProviderTinyResource($this->provider),
            'related' => new NeededCollection($related)

        ];
    }
}
