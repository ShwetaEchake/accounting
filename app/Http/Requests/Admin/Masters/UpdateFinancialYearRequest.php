<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinancialYearRequest extends FormRequest
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
            'edit_from_date'    => 'required',
            'edit_to_date'      => 'required',
            'edit_status'       => 'required',
            'edit_start_month'  => 'required',
            'edit_end_month'    => 'required',
            'edit_month_status' => 'required',
        ];
    }
}
