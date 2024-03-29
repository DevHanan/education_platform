<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            'image' =>  $this->image ? asset('uploads/tracks/'.$this->image) : "",
            'active'  => $this->active,
            'created_at'  => $this->created_at
        ];
    }
}
