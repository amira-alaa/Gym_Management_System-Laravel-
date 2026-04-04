<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GetHomeResource extends JsonResource
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
            'total_members' => $this['total_members'] ,
            'active_members' => $this['active_members'],
            'total_trainers' => $this['trainers'],
            'upComing_sessions' => $this['upComing_sessions'],
            'onGoing_sessions' => $this['onGoing_sessions'],
            'completed_sessions' => $this['completed_sessions']
        ];
    }
}
