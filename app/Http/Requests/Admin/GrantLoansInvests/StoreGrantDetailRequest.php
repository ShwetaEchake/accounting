<?php

namespace App\Http\Requests\Admin\GrantLoansInvests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrantDetailRequest extends FormRequest
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
            'grant_type' => 'required',
            'grant_name' => 'required',
            'grant_date' => 'required',
            'nature_of_the_grant' => 'required',
            'grant_from_period' => 'required',
            'grant_to_period' => 'required',
            'sanction_number' => 'required',
            'sanction_amount' => 'required',
            'sanction_date' => 'required',
            'sanctioning_authority' => 'required',
            'received_amount' => 'required',
            'fund' => 'required',
        ];
    }
}
