<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebinarTinyResource extends JsonResource
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
            // id
            // webinar type id      //see "constant"  type upcoming or live or finished
            // image
            // name
            // featured   string data
            // is public
            // start date
            // end date
            // time start
            // time end
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'is public' => $this->type == "public" ? true : false,
            'image' => asset($this->logo),
            'time' => $this->time,
            'start_date' => $this->date,
            // 'end_date' => $this->end_date,

        ];
    }
}
