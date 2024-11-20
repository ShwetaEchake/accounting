<?php

namespace App\Http\Requests\Admin\ChartAccount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChartAccountRequest extends FormRequest
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
            'edit_component_id' => 'required',
            'edit_number_of_level' => 'nullable|numeric',
            'edit_level_one_description' => 'required',
            'edit_digit_of_level_one' => 'nullable|numeric',
            'edit_level_two_description' => 'required',
            'edit_digit_of_level_two' => 'nullable|numeric',
            // 'edit_default_flag' => 'nullable',
        ];
    }
}
