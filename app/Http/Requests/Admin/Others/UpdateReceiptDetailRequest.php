<?php

namespace App\Http\Requests\Admin\Others;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiptDetailRequest extends FormRequest
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
            'receipt_date' => 'required',
            'receipt_category' => 'required',
            'received_from' => 'required',
            'payer_name' => 'required',
            'mobile_no' => 'required',
            'email_id' => 'required',
            'manual_receipt_no' => 'required',
            'narration'  => 'required',
        ];
    }
}
