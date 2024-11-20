<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkflowRequest extends FormRequest
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
        ];
    }
}
