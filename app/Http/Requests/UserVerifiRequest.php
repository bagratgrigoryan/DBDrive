<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserVerifiRequest extends FormRequest
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
            "firstName" => "required|min:3|max:50",
            "lastName" => "required|min:3|max:50",
            "email" => "required|min:3|max:50|email|unique:users,email," . Auth::user()->getAuthIdentifier()
        ];
    }
}
