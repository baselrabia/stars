<?php

namespace App\Http\Resources;

use App\Models\Event;
use Illuminate\Http\Resources\Json\JsonResource;

class EventLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $relatedEvents = Event::where('type', $this->type)->orderBy("created_at")->active()->get();
        $image = null;
        if ($this->medias != null) {
            $image = asset($this->medias->first()->file);
        }
        return [
            // new EventTinyResource($this),
            'id' => $this->id,
            'event_type' => $this->type,        //see sheet "Constant"
            'image' => $image,
            'name' => $this->name,
            'date_start' => $this->start_date,                 //formate19/11/2019    in ui page 29
            'date_end' => $this->end_date,
            // 'location_name' => $this-> ,    //example: National Institute of building sciences المعهد الوطني لعلوم البناء
            'lat' => $this->lat,
            'lng' => $this->lng,
            'time' => $this->time,          //example:   14:00    means the event will start at hour 2 PM
            'description' => $this->description,
            'Model_Video' => $this->video,
            'registration_link' => $this->link,
            'share_link_url' => $this->link,
            'related_events' => new EventCollection($relatedEvents),
        ];
    }
}
