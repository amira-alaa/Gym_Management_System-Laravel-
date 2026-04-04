<?php

namespace App\Http\Resources\Trainer;

use Illuminate\Http\Resources\Json\JsonResource;

class GetTrainerResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'specialties' => $this->specialties,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->building_no . ' - ' . $this->street . ' - ' . $this->city ,
        ];
    }
}
