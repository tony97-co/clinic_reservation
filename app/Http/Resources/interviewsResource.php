<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class interviewsResource extends JsonResource
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
            "date" => $this->date,
            "patient_name" => $this->name,
            "account_user_name" => $this->patient->patient_name,
            "patient_age" => $this->age,
            "state" =>$this->state,
            "doctor_name" => $this->doctor->user->user_name ,
            "clinic_name"  => $this->doctor->clinic->clinic_name,
            "doctor_specialist_name" => $this->doctor->specialist->specalty_name,
           
        ];
    }
}
