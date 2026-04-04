<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionRequest extends FormRequest
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
            'description'=> 'required|string|max:500|min:10',
            'start_time'=> 'required',
            'end_time'=> 'required|after:start_time',
            'trainer_id'=> 'required|exists:trainers,id',
        ];
    }
}
