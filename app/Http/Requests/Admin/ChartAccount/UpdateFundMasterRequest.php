<?php

namespace App\Http\Requests\Admin\ChartAccount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFundMasterRequest extends FormRequest
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
            'fund_level' => 'required',
            'fund_code' => 'required',
            'fund_description' => 'required',
            'final_code' => 'required',
            'fund_master.*.fund_level' => 'required',
            'fund_master.*.fund_code' => 'required',
            'fund_master.*.fund_description' => 'required',
            'fund_master.*.fund_parent_level' => 'required',
            'fund_master.*.parent_code' => 'required',
            'fund_master.*.composite_code' => 'required',
            'fund_master.*.status' => 'required',
        ];
    }
}
