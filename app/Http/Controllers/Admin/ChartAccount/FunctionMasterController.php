<?php

namespace App\Http\Controllers\Admin\ChartAccount;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\{FunctionMaster,FunctionMasterChild,FieldMaster};
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\ChartAccount\{StoreFunctionMasterRequest,UpdateFunctionMasterRequest};



class FunctionMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $function_masters = FunctionMaster::latest()->get();
        return view('admin.chart-of-account.function-master')->with(['function_masters' => $function_masters]);
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
    public function store(StoreFunctionMasterRequest $request)
    {
        try {
            $input = $request->validated();
            $data = FunctionMaster::create(Arr::only($input, FunctionMaster::getFillables()));

            foreach ($request->function_master as $child) {
                FunctionMasterChild::create([
                    'function_master_id' => $data->id,
                    'function_level' => $child['function_level'],
                    'function_code' => $child['function_code'],
                    'function_description' => $child['function_description'],
                    'function_parent_level' => $child['function_parent_level'],
                    'parent_code' => $child['parent_code'],
                    'composite_code' => $child['composite_code'],
                ]);
            }

            return response()->json(['success' => 'Function Master created successfully.']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'FunctionMaster');
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
    public function edit(FunctionMaster $function_master)
    {
        $function_master_child = $function_master->function_master_child;

        if ($function_master) {
            //--- data selected ---
            $tableRows = '';
            foreach ($function_master_child as $index => $rowData) :
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="function_master[' . $index . '][function_master_child_id]" value="' . $rowData->id . '" class="form-control"></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="function_master[' . $index . '][function_level]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($account_heads as $account_head):
                // $is_select = $rowData['child_id'] == $rowData->account_head ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->function_level == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><input type="text" name="function_master[' . $index . '][function_code]" value="' . $rowData->function_code . '" class="form-control"></td>';
                $tableRows .= '<td><input type="text" name="function_master[' . $index . '][function_description]" value="' . $rowData->function_description . '" class="form-control"></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="function_master[' . $index . '][function_parent_level]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->function_parent_level == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="function_master[' . $index . '][parent_code]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->parent_code == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><input type="text" name="function_master[' . $index . '][composite_code]" value="' . $rowData->composite_code . '" class="form-control"></td>';

                $tableRows .= '<td><a data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;

            //--- data selected ---

            $response = [
                'result' => 1,
                'function_master' => $function_master,
                'tableRows' => $tableRows,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFunctionMasterRequest $request, FunctionMaster $function_master)
    {
        try {
            $input = $request->validated();
            $function_master->update(Arr::only($input, FunctionMaster::getFillables()));
            foreach ($request->function_master as $key =>  $child) {
                $auto_id = $child['function_master_child_id'] ?? null;

                FunctionMasterChild::updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                    'function_master_id' => $function_master->id,
                    'function_level' => $child['function_level'],
                    'function_code' => $child['function_code'],
                    'function_description' => $child['function_description'],
                    'function_parent_level' => $child['function_parent_level'],
                    'parent_code' => $child['parent_code'],
                    'composite_code' => $child['composite_code'],
                ]);
            }

            return response()->json(['success' => 'Function Master updated successfully.']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'FunctionMaster');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FunctionMaster $function_master)
    {
        try
        {
            DB::beginTransaction();
            $function_master->delete();
            DB::commit();
            return response()->json(['success'=> 'Function Master deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Function Master');
        }
    }

    public function deleteChild($id)
    {
        try
        {
            DB::beginTransaction();
            DB::table('function_master_children')->where('id',$id)->delete();
            DB::commit();
            return response()->json(['success'=> 'Function Master child deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Function Master child');
        }
    }
}
