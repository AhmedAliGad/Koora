<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:200',
            'content' => 'required|string|min:15',
            'image' => ($this->method() === 'POST' ? 'required|' : '') . 'image',
            $this->filled('team_id') ? 'required|numeric|exists:teams,id': '',
        ];
    }
}
