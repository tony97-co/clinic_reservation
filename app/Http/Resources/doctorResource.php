<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class doctorResource extends JsonResource
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
            "address" => $this->address,
            "price" => $this->price,
            "start_date" => $this->created_at->diffForHumans(),
            "qualifications" => $this->qualifications,
            "birth" =>$this->birth,
            "about" => $this->about ,
            "user"  => $this->user,
            "specialist" => $this->specialist,
            "clinic" => $this->clinic,
            "interviews_count" => $this->interview->count()
        ];

    }
}
