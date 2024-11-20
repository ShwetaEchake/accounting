<?php

namespace App\Http\Requests\Admin\ChartAccount;

use Illuminate\Foundation\Http\FormRequest;

class StoreFunctionMasterRequest extends FormRequest
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
            'function_level' => 'required',
            'function_code' => 'required',
            'function_description' => 'required',
            'final_code' => 'required',
            // 'function_master.*.function_level' => 'required',
            // 'function_master.*.function_code' => 'required',
            // 'function_master.*.function_description' => 'required',
            // 'function_master.*.function_parent_level' => 'required',
            // 'function_master.*.parent_code' => 'required',
            // 'function_master.*.composite_code' => 'required',
        ];
    }
}
