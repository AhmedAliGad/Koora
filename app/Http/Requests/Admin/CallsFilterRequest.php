<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CallsFilterRequest extends FormRequest
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
            'user_id' => 'nullable|integer|exists:users,id',
            'admin_id' => 'nullable|integer|exists:users,id',
            'duration_from' => 'nullable|integer|min:0|lt:duration_to',
            'duration_to' => 'nullable|integer|min:1|gte:duration_from',
            'rate' => 'nullable|integer|digits_between: 0,5',
            'date_from' => 'nullable|date|before_or_equal:date_from',
            'date_to' => 'nullable|date|after_or_equal:date_from'
        ];
    }
}
