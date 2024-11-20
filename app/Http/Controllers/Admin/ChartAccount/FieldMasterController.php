<?php

namespace App\Http\Controllers\Admin\ChartAccount;

use App\Models\{FieldMaster,FieldMasterChild,FunctionMaster};
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChartAccount\{StoreFieldMasterRequest,UpdateFieldMasterRequest};

class FieldMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $field_masters = FieldMaster::latest()->get();
        return view('admin.chart-of-account.field-master')->with(['field_masters' => $field_masters]);
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
    public function store(StoreFieldMasterRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['field_level'] = $input['master_field_level'];
            $input['field_code'] = $input['master_field_code'];
            $input['field_description'] = $input['master_field_description'];
            $input['final_code'] = $input['master_final_code'];
            $data = FieldMaster::create(Arr::only($input, FieldMaster::getFillables()));

            foreach ($request->field_level as $key => $field_level_child) {
                $createData = new FieldMasterChild([
                    'field_level' => $request->field_level[$key],
                    'field_code' => $request->field_code[$key],
                    'field_description' => $request->field_description[$key],
                    'field_parent_level' => $request->field_parent_level[$key],
                    'parent_code' => $request->parent_code[$key],
                    'composite_code' => $request->composite_code[$key],
                ]);
                $data->field_master_child()->save($createData);
            }
            DB::commit();
            return response()->json(['success' => 'Field Master created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'FieldMaster');
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
    public function edit(FieldMaster $field_master)
    {
        $field_master_child = $field_master->field_master_child;

        if ($field_master)
        {
            //--- data selected ---
            $tableRows = '';
            foreach ($field_master_child as $index => $rowData):
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="field_master_child_id[]" value="' . $rowData->id . '" class="form-control"></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="field_level[]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($account_heads as $account_head):
                // $is_select = $rowData['child_id'] == $rowData->account_head ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->field_level == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><input type="text" name="field_code[]" value="' . $rowData->field_code . '" class="form-control"></td>';
                $tableRows .= '<td><input type="text" name="field_description[]" value="' . $rowData->field_description . '" class="form-control"></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="field_parent_level[]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->field_parent_level == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="parent_code[]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->parent_code == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><input type="text" name="composite_code[]" value="' . $rowData->composite_code . '" class="form-control"></td>';

                $tableRows .= '<td style=""><a data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;

            //--- data selected ---

            // dd($tableRows);
            $response = [
                'result' => 1,
                'field_master' => $field_master,
                'tableRows' =>$tableRows,
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
    public function update(UpdateFieldMasterRequest $request, FieldMaster $field_master)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

            $field_master->update( Arr::only( $input, FieldMaster::getFillables() ) );
            $input['field_level'] = $input['master_field_level'];
            $input['field_code'] = $input['master_field_code'];
            $input['field_description'] = $input['master_field_description'];
            $input['final_code'] = $input['master_final_code'];
            foreach ($request->field_level as $key => $field_level_child) {
                $auto_id = $request->field_master_child_id[$key] ?? null;
                $field_master->field_master_child()->updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                        'field_level' => $request->field_level[$key],
                        'field_code' => $request->field_code[$key],
                        'field_description' => $request->field_description[$key],
                        'field_parent_level' => $request->field_parent_level[$key],
                        'parent_code' => $request->parent_code[$key],
                        'composite_code' => $request->composite_code[$key],
                    ]
                );
            }

            DB::commit();
            return response()->json(['success'=> 'Field Master updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Field Master');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FieldMaster $field_master)
    {
        try
        {
            DB::beginTransaction();
            $field_master->delete();
            DB::commit();
            return response()->json(['success'=> 'Field Master deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Field Master');
        }
    }

    public function deleteChild($id)
    {
        try
        {
            DB::beginTransaction();
            DB::table('field_master_children')->where('id',$id)->delete();
            DB::commit();
            return response()->json(['success'=> 'Field Master child deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Field Master child');
        }
    }
}
