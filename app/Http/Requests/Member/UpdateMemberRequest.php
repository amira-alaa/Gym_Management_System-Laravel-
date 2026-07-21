<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            // Validation rules for member update
            'email' => 'required|email|regex:/^[\w\.-]+@([\w-]+\.)+[a-zA-Z]{2,}$/',
            'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
            'building_no' => 'required',
            'street' => 'required',
            'city' => 'required'
        ];
    }
}
