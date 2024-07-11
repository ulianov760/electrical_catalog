<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipmentsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2',
                'max:250',
                Rule::unique('equipments', 'name')->ignore(request()->id)
            ],
            'description' => [
                'required',
                'string',
                'min:2',
            ],
            'category_id' => [
                'required',
            ],
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
