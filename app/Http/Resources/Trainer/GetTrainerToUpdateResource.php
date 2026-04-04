<?php

namespace App\Http\Resources\Trainer;

use Illuminate\Http\Resources\Json\JsonResource;

class GetTrainerToUpdateResource extends JsonResource
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
            'building_no' => $this->building_no,
            'street' => $this->street,
            'city' => $this->city
        ];
    }
}
