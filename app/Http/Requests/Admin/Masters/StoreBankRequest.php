<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'ifsc_code' => 'required',
            'micr_code' => 'nullable',
            'city' => 'required',
            'district' => 'required',
            'state' => 'required',
            'branch_address' => 'required',
            'status' => 'required',
            'contact_details' => 'nullable',
        ];
    }
}
