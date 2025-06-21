<?php

namespace App\Http\Requests;

use App\Models\ElectricalEquipment;
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
                'min:3',
                'max:250',
                Rule::unique( ElectricalEquipment::class, 'name')->ignore(request()->id)
            ],
            'description' => [
                'required',
                'string',
                'min:2',
            ],
            'characters' => [
                'required',
                'string',
                'min:2',
            ],
            'category_id' => [
                'required',
            ],

            'cost' =>[
                'required',
                'numeric',
                'min:10',
                'max:1000000',
            ],
            'count' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],
            'discount' => [
                '',
                'integer',
                'min:0',
                'max:100',
            ],
            'image' => 'required',
        ];
    }
}
