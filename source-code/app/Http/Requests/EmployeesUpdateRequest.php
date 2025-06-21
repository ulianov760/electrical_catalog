<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fio' => [
                'required',
                'string',
                'min:5',
                'max:250',
            ],
            'age' => [
                'required',
                'integer',
                'min:18',
                'max:100',
            ],
            'email' => [
                'required',
                'email',
                //Rule::unique('employees', 'email')->ignore(request()->email)
            ],
            'post_id' => [
                'required',
            ],
            'phone' => [
                'required',
                'string',
                'min:8',
                'regex:/^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$/'
            ]
        ];
    }
}
