<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use App\Models\{Master,VoucherTemplateEntry,Department,MappingDetail};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Others\{StoreVoucherTemplateEntryRequest,UpdateVoucherTemplateEntryRequest};
use Illuminate\Support\Facades\DB;


class VoucherTemplateEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['voucher_templates'] = VoucherTemplateEntry::latest()->get();
        $data['departments'] = Department::latest()->get();
        $data['masters'] = Master::latest()->get();
        return view('admin.others.voucher_template_entry',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoucherTemplateEntryRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $data = VoucherTemplateEntry::create( Arr::only( $input, VoucherTemplateEntry::getFillables() ) );

            foreach($request->account_type as $key => $account_type){
                $createData = new MappingDetail([
                    'account_type' => $request->account_type[$key],
                    'dr_cr' => $request->dr_cr[$key],
                    'mode' => $request->mode[$key],
                    'account_head' => $request->account_head[$key],

                ]);
                $data->mappingDetail()->save($createData);
            }

            DB::commit();
            return response()->json(['success'=> 'Voucher Template Entry created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Workflow');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoucherTemplateEntry $voucher_template_entry)
    {
        $template_types = VoucherTemplateEntry::latest()->get();
        $departments = Department::latest()->get();

        $mapping_details = $voucher_template_entry->mappingDetail;


        if ($voucher_template_entry)
        {
            $departmentsHtml = '<span>
                <option value="">--Select--</option>';
                foreach($departments as $department):
                    $is_select = $department->id == $voucher_template_entry->department_id ? "selected" : "";
                    $departmentsHtml .= '<option value="'.$department->id.'" '.$is_select.'>'.$department->department_name.'</option>';
                endforeach;
            $departmentsHtml .= '</span>';

            // $servicesHtml = '<span>
            //     <option value="">--Select--</option>';
            //     foreach($services as $service):
            //         $is_select = $service->id == $workflow->service_id ? "selected" : "";
            //         $servicesHtml .= '<option value="'.$service->id.'" '.$is_select.'>'.$service->name.'</option>';
            //     endforeach;
            // $servicesHtml .= '</span>';


             //--- data selected ---
                // $tableRows = '';
                // foreach ($workflow_steps as $index=> $rowData):
                //     $tableRows .= '<tr>';
                //     $tableRows .= '<td><input type="hidden" name="auto_id[]" value="' . $rowData->id . '" class="form-control" ></td>';

                //     $tableRows .= '<td>';
                //     $tableRows .= '<select name="event_id[]" class="js-example-basic-single form-control">';
                //     $tableRows .='<option value="">--Select--</option>';
                //         foreach($events as $event):
                //             $is_select = $event->id == $rowData->event_id ? "selected" : "";
                //             $tableRows .= '<option value="'.$event->id.'" '.$is_select.'>'.$event->description.'</option>';
                //         endforeach;
                //     $tableRows .= '</select>';
                //     $tableRows .= '</td>';

                //     $tableRows .= '<td>';
                //     $tableRows .= '<select name="organization_id[]" class="js-example-basic-single form-control">';
                //     $tableRows .='<option value="">--Select--</option>';
                //         foreach($organizations as $organization):
                //             $is_select = $organization->id == $rowData->organization_id ? "selected" : "";
                //             $tableRows .= '<option value="'.$organization->id.'" '.$is_select.'>'.$organization->description.'</option>';
                //         endforeach;
                //     $tableRows .= '</select>';
                //     $tableRows .= '</td>';

                //     $tableRows .= '<td>';
                //     $tableRows .= '<select name="department_ids[]" class="js-example-basic-single form-control">';
                //     $tableRows .='<option value="">--Select--</option>';
                //         foreach($departments as $department):
                //             $is_select = $department->id == $rowData->department_id ? "selected" : "";
                //             $tableRows .= '<option value="'.$department->id.'" '.$is_select.'>'.$department->department_name.'</option>';
                //         endforeach;
                //     $tableRows .= '</select>';
                //     $tableRows .= '</td>';

                //     $tableRows .= '<td>';
                //     $tableRows .= '<select name="role_id[]" class="js-example-basic-single form-control">';
                //     $tableRows .='<option value="">--Select--</option>';
                //         foreach($users as $user):
                //             $is_select = $user->id == $rowData->role_id ? "selected" : "";
                //             $tableRows .= '<option value="'.$user->id.'" '.$is_select.'>'.$user->name.'</option>';
                //         endforeach;
                //     $tableRows .= '</select>';
                //     $tableRows .= '</td>';

                //     $tableRows .= '<td><input type="text" name="details[]" value="' . $rowData->details . '" class="form-control" ></td>';
                //     $tableRows .= '<td><input type="text" name="sla[]" value="' . $rowData->sla . '" class="form-control" ></td>';

                //     $tableRows .= '<td>';
                //     $tableRows .= '<select name="unit_id[]" class="js-example-basic-single form-control">';
                //     $tableRows .='<option value="">--Select--</option>';
                //         foreach($units as $unit):
                //             $is_select = $unit->id == $rowData->unit_id ? "selected" : "";
                //             $tableRows .= '<option value="'.$unit->id.'" '.$is_select.'>'.$unit->description.'</option>';
                //         endforeach;
                //     $tableRows .= '</select>';
                //     $tableRows .= '</td>';

                //     $tableRows .= '<td><input type="text" name="no_of_approvers[]" value="' . $rowData->no_of_approvers . '" class="form-control" ></td>';

                //     $tableRows .= '<td style=""><a href="javascip:" data-id="'.$rowData->id.'" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                //     $tableRows .= '</tr>';
                // endforeach;
             //--- data selected ---

            $response = [
                'result' => 1,
                'voucher_template_entry' => $voucher_template_entry,
                'departmentsHtml' => $departmentsHtml,
                // 'servicesHtml' => $servicesHtml,
                // 'workflow_modeHtml' => $workflow_modeHtml,
                // 'tableRows' => $tableRows,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoucherTemplateEntryRequest $request, VoucherTemplateEntry $voucher_template_entry)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $voucher_template_entry->update( Arr::only( $input, VoucherTemplateEntry::getFillables() ) );

            foreach ($request->account_type as $key => $account_type) {
                $auto_id = $request->auto_id[$key] ?? null;
                $voucher_template_entry->mappingDetail()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'account_type' => $request->account_type[$key],
                        'dr_cr' => $request->dr_cr[$key],
                        'mode' => $request->mode[$key],
                        'account_head' => $request->account_head[$key],
                    ]
                );
            }

            DB::commit();
            return response()->json(['success'=> 'Voucher Entry Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Voucher Entry Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
