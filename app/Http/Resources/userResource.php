<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
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
            "id"=> $this->id,
            "user_name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "location" =>$this->location,
            "address" => $this->address ,
           
        ];

    }
}
