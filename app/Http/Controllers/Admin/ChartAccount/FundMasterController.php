<?php

namespace App\Http\Controllers\Admin\ChartAccount;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\{FundMaster,FundMasterChild};
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\ChartAccount\{StoreFundMasterRequest,UpdateFundMasterRequest};


class FundMasterController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fund_masters = FundMaster::latest()->get();
        return view('admin.chart-of-account.fund-master')->with(['fund_masters' => $fund_masters]);
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
    public function store(StoreFundMasterRequest $request)
    {
        try {
            $input = $request->validated();
            $data = FundMaster::create(Arr::only($input, FundMaster::getFillables()));

            foreach ($request->fund_master as $child) {
                FundMasterChild::create([
                    'fund_master_id' => $data->id,
                    'fund_level' => $child['fund_level'],
                    'fund_code' => $child['fund_code'],
                    'fund_description' => $child['fund_description'],
                    'fund_parent_level' => $child['fund_parent_level'],
                    'parent_code' => $child['parent_code'],
                    'composite_code' => $child['composite_code'],
                    'status' => $child['status'],
                ]);
            }

            return response()->json(['success' => 'Fund Master created successfully.']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'FundMaster');
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
    public function edit(FundMaster $fund_master)
    {
        $fund_master_child = $fund_master->fund_master_child;

        if ($fund_master) {
            //--- data selected ---
            $tableRows = '';
            foreach ($fund_master_child as $index => $rowData) :
                $tableRows .= '<tr>';
                $tableRows .= '<td><input type="hidden" name="fund_master[' . $index . '][fund_master_child_id]" value="' . $rowData->id . '" class="form-control"></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="fund_master[' . $index . '][fund_level]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($account_heads as $account_head):
                // $is_select = $rowData['child_id'] == $rowData->account_head ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->fund_level == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><input type="text" name="fund_master[' . $index . '][fund_code]" value="' . $rowData->fund_code . '" class="form-control"></td>';
                $tableRows .= '<td><input type="text" name="fund_master[' . $index . '][fund_description]" value="' . $rowData->fund_description . '" class="form-control"></td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="fund_master[' . $index . '][fund_parent_level]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->fund_parent_level == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td>';
                $tableRows .= '<select name="fund_master[' . $index . '][parent_code]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="1"' . ($rowData->parent_code == 1 ? " selected" : "") . '>Test</option>';
                // endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><input type="text" name="fund_master[' . $index . '][composite_code]" value="' . $rowData->composite_code . '" class="form-control"></td>';


                $tableRows .= '<td>';
                $tableRows .= '<select name="fund_master[' . $index . '][status]" class="js-example-basic-single form-control">';
                $tableRows .= '<option value="">--Select--</option>';
                // foreach($demand_classifications as $demand_classification):
                // $is_select = $demand_classification->id == $rowData->demand_classification ? "selected" : "";
                $tableRows .= '<option value="0"' . ($rowData->status == 0 ? " selected" : "") . '>In-Active</option>';
                $tableRows .= '<option value="1"' . ($rowData->status == 1 ? " selected" : "") . '>Active</option>';
                // endforeach;

                $tableRows .= '</select>';
                $tableRows .= '</td>';

                $tableRows .= '<td><a data-id="' . $rowData->id . '" class="btn btn-sm btn-danger deleteAddMore"><i class="fa fa-remove"></i></a></td>';
                $tableRows .= '</tr>';
            endforeach;

            //--- data selected ---

            $response = [
                'result' => 1,
                'fund_master' => $fund_master,
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
    public function update(UpdateFundMasterRequest $request, FundMaster $fund_master)
    {
        try {
            $input = $request->validated();
            $fund_master->update(Arr::only($input, FundMaster::getFillables()));
            foreach ($request->fund_master as $key =>  $child) {
                $auto_id = $child['fund_master_child_id'] ?? null;

                FundMasterChild::updateOrCreate(
                    [
                        'id' => $auto_id,
                    ],
                    [
                    'fund_master_id' => $fund_master->id,
                    'fund_level' => $child['fund_level'],
                    'fund_code' => $child['fund_code'],
                    'fund_description' => $child['fund_description'],
                    'fund_parent_level' => $child['fund_parent_level'],
                    'parent_code' => $child['parent_code'],
                    'composite_code' => $child['composite_code'],
                    'status' => $child['status'],
                ]);
            }

            return response()->json(['success' => 'Fund Master updated successfully.']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'FundMaster');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundMaster $fund_master)
    {
        try
        {
            DB::beginTransaction();
            $fund_master->delete();
            DB::commit();
            return response()->json(['success'=> 'Fund Master deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Fund Master');
        }
    }

    public function deleteChild($id)
    {
        try
        {
            DB::beginTransaction();
            DB::table('fund_master_children')->where('id',$id)->delete();
            DB::commit();
            return response()->json(['success'=> 'Fund Master child deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Fund Master child');
        }
    }

}
