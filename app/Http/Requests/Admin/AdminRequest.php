<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'phone' => $this->filled('phone') ? 'required|digits:10' : '',
            'email' => 'required|string|email|max:255|unique:users,email,'.optional($this->admin)->id,
            'password' => $this->method() === 'POST' ? 'required|string|min:8|' : '',
        ];
    }
}
