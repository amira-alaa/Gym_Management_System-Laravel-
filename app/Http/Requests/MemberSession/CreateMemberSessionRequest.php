<?php

namespace App\Http\Requests\MemberSession;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMemberSessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'member_id' => 'required|exists:members,id',
            'session_id' => [
                'required',
                'exists:sessions,id',
                    Rule::unique('membersessions')
                        ->where(fn ($query) =>
                            $query->where('member_id', $this->member_id)
                        )
            ]
        ];
    }
}
