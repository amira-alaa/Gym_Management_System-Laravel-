<?php

namespace App\Http\Resources\MemberSession;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GetMemberSessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'id' => $this->id,
            'status' => $this->start_time > now() ? "Upcoming": ($this->start_time <= now()&&$this->end_time >now()? "Ongoing" : "Completed"),
            'category_name'=> $this->category->name ,
            'description' => $this->description ,
            'trainer_name' => $this->trainer->name ,
            'start_date' => $this->start_time ,
            'end_date' => $this->end_time ,
            'date_display' => carbon::parse($this->start_time)->format('d M Y'),          // start date
            'duration' => Carbon::parse($this->start_time)->diff(Carbon::parse($this->end_time)) ,             // start_date - end_date
            'time_range_display'=> Carbon::parse($this->start_time)->format('h:i A') .' - '. Carbon::parse($this->end_time)->format('h:i A'),      // start_time - end_time
            'available_slots' => $this->members()->count(),
            'capacity' => $this->capacity
        ];
    }
}
