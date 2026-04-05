<?php

namespace App\Http\Resources\MemberSession;

use Illuminate\Http\Resources\Json\JsonResource;

class GetMembersForOngoingResource extends JsonResource
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
            'session_id' => $this->session_id,
            'member_id' => $this->member_id,
            'member_name' => $this->member->name,
            'is_attended' => $this->is_attended

        ];
    }
}
