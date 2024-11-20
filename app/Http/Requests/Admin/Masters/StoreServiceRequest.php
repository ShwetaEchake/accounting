<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'department' => 'required',
            'child_department' => 'required',
            'name' => 'required',
            'regional' => 'required',
            'short_code' => 'required',
            'status' => 'required',
            'checklist_verification_applicable' => 'required',
            'challan_validity' => 'nullable',
            'checklist_approval_applicable' => 'nullable',
            'approval' => 'nullable',
            'rejection' => 'nullable',
            'printing_responsibility' => 'required',
            'remark' => 'nullable',
            'fee_schedule' => 'required',
            'select_applicable_option' => 'nullable',
            'bpm_process' => 'required',
            'sla' => 'nullable',
            'units' => 'nullable',
        ];
    }
}
