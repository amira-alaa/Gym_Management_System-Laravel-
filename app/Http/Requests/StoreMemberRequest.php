<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            // Validation rules for member creation
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|unique:members,phone',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'building_no' => 'required',
            'street' => 'required',
            'city' => 'required',
            'health_record_height' => 'required',
            'health_record_weight' => 'required',
            'health_record_blood_type' => 'required'
        ];
    }
}
