<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone' => 'required|digits:10',
            'email' => 'required|string|email|max:255|unique:users,email,'.optional($this->user)->id,
            'password' => $this->method() === 'POST' ? 'required|string|min:8|' : '',
            'city_id' => 'required|numeric|exists:cities,id',
            'area_id' => 'required|numeric|exists:areas,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'city_id' => 'City',
            'area_id' => 'Area',
        ];
    }
}
