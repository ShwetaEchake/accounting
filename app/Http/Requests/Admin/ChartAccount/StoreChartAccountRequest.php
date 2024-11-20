<?php

namespace App\Http\Requests\Admin\ChartAccount;

use Illuminate\Foundation\Http\FormRequest;

class StoreChartAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'component_id' => 'required',
            'number_of_level' => 'nullable|numeric',
            'level_one_description' => 'required',
            'digit_of_level_one' => 'nullable|numeric',
            'level_two_description' => 'required',
            'digit_of_level_two' => 'nullable|numeric',
            // 'default_flag' => 'nullable',
        ];
    }
}
