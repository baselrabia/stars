<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'user' => $this->user->name,
            'content' => $this->content,
            'like'=> $this->like,
            'image' => asset($this->image),
            'comments' => new CommentCollection($this->comments),
        ];
    }
}
