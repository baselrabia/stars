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
        $image = null;
        if ($this->medias != null) {
            $image = asset($this->medias->first()->file);
        }

 $country = DB::table('countries')->where('id', $this->country)->first();

        return [
            'id' => $this->id,
            'type' => $this->type,
            'is public' => $this->type == "public" ? true : false,
            'image' => $image,
            'name' => $this->name,
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
            'country' =>  $country->name,
            'providers' => $this->providers->map->only(['id', 'company_fullname', 'logo']),
            'categories' => $this->categories->map->only(['id', 'name']),


        ];
    }
}
