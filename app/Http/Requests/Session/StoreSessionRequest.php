<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;

use function GuzzleHttp\describe_type;

class StoreSessionRequest extends FormRequest
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
            'description' => 'required|string|max:255|min:10',
            'capacity' => 'required|integer|min:1|max:25',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id',
        ];
    }
}
