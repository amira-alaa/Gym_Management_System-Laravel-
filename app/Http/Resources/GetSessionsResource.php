<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GetSessionsResource extends JsonResource
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
            'id'=> $this->id,
            'category_name' => $this->category->name,
            'status' => $this->start_time < now() && $this->end_time > now() ? 'Ongoing' : ($this->start_time > now() ? 'Upcoming' : 'Completed'),
            'description'=> $this->description,
            'trainer_name'=> $this->trainer->name,
            'start_date' => Carbon::parse($this->start_time) ,                                  //$this->start_time,
            'end_date' => Carbon::parse($this->end_time)->format('d M Y h:i A')   ,
            'time' => Carbon::parse($this->start_time)->format('h:i A') .' - '. Carbon::parse($this->end_time)->format('h:i A') ,
            'duration' => Carbon::parse($this->start_time)->diff(Carbon::parse($this->end_time)),
            'capacity'=> $this->capacity,
            'available_slots'=>$this->members()->count()

        ];
    }
}
