<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image= null;
        if($this->image){
            $image = asset($this->image);
        }

        return [
            'user' => $this->user->name,
            'comment' => $this->comment,
            'image' => $image
        ];

    }
}
