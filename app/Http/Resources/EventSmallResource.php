<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventSmallResource extends JsonResource
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
            'id' => $this->id,
            'event_type' => $this->type ,        //see sheet "Constant"
            'image' => $this->image ,
            'name' => $this->name ,
            'date_start' => $this->start_date ,                 //formate19/11/2019    in ui page 29
            'date_end' => $this->end_date ,
            // 'location_name' => $this-> ,    //example: National Institute of building sciences المعهد الوطني لعلوم البناء
            'lat' => $this->lat ,
            'lng' => $this->lng,
            // 'image' => $this->medias->file,
        ];
    }
}
