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
            "user_name"  => $this->user->user_name,
            "specialist_name" => $this->specialist->specalty_name,
            "clinic_name" => $this->clinic->clinic_name,
            "interviews_count" => $this->interviews_count
        ];

    }
}
