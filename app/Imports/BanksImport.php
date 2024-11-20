<?php

namespace App\Imports;

use App\Models\Bank;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BanksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (empty($row['bank_name'])) {
            return null;
        }
        return new Bank([
            'bank_name' => $row['bank_name'],
            'bank_branch' => $row['branch_name'],
            'ifsc_code' => $row['ifsc_code'],
            'micr_code' => $row['micr_code'],
            'city' => $row['city'],
            'district' => $row['district'],
            'state' => $row['state'],
            'branch_address' => $row['branch_address'],
            'status' =>  $row['status'] == 'Active' ? 1 : 0,
            'contact_details' => $row['contact_details'],
        ]);
    }

    // public function rules(): array
    // {
    //     return [
    //         'bank_name' => 'required|string|max:255',
    //         'branch_name' => 'nullable|string|max:255',
    //         'ifsc_code' => 'nullable|string|max:255',
    //         'micr_code' => 'nullable|string|max:255',
    //         'city' => 'nullable|string|max:255',
    //         'district' => 'nullable|string|max:255',
    //         'state' => 'nullable|string|max:255',
    //         'branch_address' => 'nullable|string|max:255',
    //         'status' => 'nullable|string|in:Active,Inactive',
    //         'contact_details' => 'nullable|string|max:255',
    //     ];
    // }

    // public function customValidationMessages()
    // {
    //     return [
    //         'bank_name.required' => 'The bank name is required.',
    //         'bank_name.string' => 'The bank name must be a string.',
    //         'bank_name.max' => 'The bank name may not be greater than 255 characters.',
    //     ];
    // }



}
