<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkflowRequest extends FormRequest
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
            'department_id' => 'required',
            'service_id' => 'required',
            'from_amount' => 'required|numeric',
            'to_amount' => 'required|numeric',
            'workflow_mode_id' => 'required',
            'location_type' => 'required',
            'event_id' => 'required|exists:workflow_steps,event_id',
            'organization_id' => 'required|exists:workflow_steps,organization_id',
            'department_id' => 'required|exists:departments,id',
            'department_ids' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            'details' => 'nullable',
            'sla' => 'nullable',
            'unit_id' => 'required|exists:units,id',
            'no_of_approvers' => 'nullable',
            // 'no_of_approvers' => 'required|integer|min:1|exists:workflow_steps,no_of_approvers',
        ];
    }


    public function messages()
    {
        return[
            'role_id.required' => 'The role filed is the most important one!!!'
        ];
    }

}
