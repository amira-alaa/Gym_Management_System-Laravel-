<?php

namespace App\Http\Requests\Trainer;

use App\Traits\Handler;
use Illuminate\Foundation\Http\FormRequest;

class StoreTrainerRequest extends FormRequest
{
    // use Handler;
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainers,email|regex:/^[\w\.-]+@([\w-]+\.)+[a-zA-Z]{2,}$/',
            'phone' => 'required|unique:trainers,phone|min:11|regex:/^\+?[0-9]{10,15}$/',
            'date_of_birth' => 'required|date',
            'specialties' => 'required',
            'gender' => 'required',
            'building_no' => 'required',
            'street' => 'required',
            'city' => 'required',
        ];
    }
}
