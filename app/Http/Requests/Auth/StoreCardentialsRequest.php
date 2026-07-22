<?php

namespace App\Http\Requests\Auth;

use App\Traits\Handler;
use Illuminate\Foundation\Http\FormRequest;

class StoreCardentialsRequest extends FormRequest
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
            // 'name' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users|regex:/^[\w\.-]+@([\w-]+\.)+[a-zA-Z]{2,}$/',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
