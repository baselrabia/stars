<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventTinyResource extends JsonResource
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
            'id' => $this->id,
            'event_type' => $this->type,        //see sheet "Constant"
            'image' => $image,
            'name' => $this->name,
            'date_start' => $this->start_date,                 //formate19/11/2019    in ui page 29
            'date_end' => $this->end_date,
            // 'location_name' => $this-> ,    //example: National Institute of building sciences المعهد الوطني لعلوم البناء
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }
}
