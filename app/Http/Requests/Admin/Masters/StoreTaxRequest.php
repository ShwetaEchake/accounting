<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaxRequest extends FormRequest
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
            'tax_name' => 'required',
            'department' => 'required',
            'applicable_at' => 'required',
            'calculation_method' => 'required',
            'parent_tax_code' => 'nullable',
            'tax_group' => 'required',
            'tax_category' => 'required',
            'tax_sub_category' => 'required',
            'services' => 'required',
            'print_on' => 'required',
            'collection_sequence' => 'required',
            'display_sequence' => 'required',
            'data_in_left_side_box' => 'nullable',
            'data_in_right_side_box' => 'nullable',
            'account_head' => 'required',
            'demand_classification' => 'required',
            'status' => 'required',
        ];
    }
}
