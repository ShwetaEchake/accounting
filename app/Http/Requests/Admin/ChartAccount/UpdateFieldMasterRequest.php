<?php

namespace App\Http\Requests\Admin\ChartAccount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldMasterRequest extends FormRequest
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
            'master_field_level' => 'required',
            'master_field_code' => 'required',
            'master_field_description' => 'required',
            'master_final_code' => 'required',
        ];
    }
}
