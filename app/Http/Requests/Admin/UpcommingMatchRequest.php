<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpcommingMatchRequest extends FormRequest
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
            'date' => 'required|date',
            'stadium' => 'required|string|min:3',
            'first_team_id' => 'required|numeric|exists:teams,id',
            'second_team_id' => 'required|numeric|exists:teams,id|different:first_team_id',
        ];
    }
}
