<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|exists:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
            'code' => 'required|numeric|digits:6',
        ];
    }
}
