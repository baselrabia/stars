<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class WebinarLargeResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->type,
            'is public' => $this->type == "public" ? true : false,
            'image' => asset($this->logo),
            'time' => $this->time,
            'start_date' => $this->date,
            // 'end_date' => $this->end_date,

            // select a host        //example: youtube
            // link of host        //example: youtube/xxxxxxx
            // summary
            // description
            // country name + flag
            // suppliers for cateogory ids:   json array of category id

            // - list of model Message

            // -------------------------------------- video
            // download url                  //download url to see finished video
            // dynamic url                //when video is live

            'host' => $this->host,
            'link_of_host' => $this->link,
            'summary' => $this->summary,
            'description' => $this->description,
            'country' =>  $this->countryName,
            'providers' => $this->providers->map->only(['id', 'company_fullname', 'logo']),
            'categories' => $this->categories->map->only(['id', 'name']),


        ];
    }
}
