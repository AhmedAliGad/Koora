<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WorkingHourRequest extends FormRequest
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
            'from' => 'date_format:H:i|before:to',
            'to' => 'date_format:H:i|after:from',
        ];
    }

    public function attributes()
    {
        return [
            'from' => 'Start Time',
            'to' => 'End Time'
        ];
    }
}
