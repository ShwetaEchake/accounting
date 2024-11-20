<?php

namespace App\Http\Controllers\Admin\ChartAccount;

use Illuminate\Support\Arr;
use App\Models\{ChartAccount,ComponentName};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChartAccount\{StoreChartAccountRequest,UpdateChartAccountRequest};


class ChartAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $component_names = ComponentName::latest()->get();
        $chart_accounts = ChartAccount::with('component_name')->latest()->get();
        return view('admin.chart-of-account.chart-of-account')->with(['component_names' => $component_names, 'chart_accounts' => $chart_accounts]);
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
    public function store(StoreChartAccountRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ChartAccount::create( Arr::only( $input, ChartAccount::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Chart account created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'ChartAccount');
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
    public function edit(ChartAccount $chart_of_account)
    {
        $component_names = ComponentName::latest()->get();

        if ($chart_of_account) {

                $componentnameHtml = '<span>
                <option value="">--Select--</option>';
                foreach($component_names as $component_name):
                    $is_select = $component_name->id == $chart_of_account->component_id ? "selected" : "";
                    $componentnameHtml .= '<option value="'.$component_name->id.'" '.$is_select.'>'.$component_name->description.'</option>';
                endforeach;
                $componentnameHtml .= '</span>';

            $response = [
                'result' => 1,
                'chartaccount' => $chart_of_account,
                'componentnameHtml' => $componentnameHtml,
            ];

        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChartAccountRequest $request, ChartAccount $chart_of_account)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $chart_of_account->update([
                'component_id' => $input['edit_component_id'],
                'number_of_level' => $input['edit_number_of_level'],
                'level_one_description' => $input['edit_level_one_description'],
                'digit_of_level_one' => $input['edit_digit_of_level_one'],
                'level_two_description' => $input['edit_level_two_description'],
                'digit_of_level_two' => $input['edit_digit_of_level_two'],
                'default_flag' => $request->has('edit_default_flag') ? true : false,
            ]);
            DB::commit();

            return response()->json(['success'=> 'Chart Account updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Chart Account');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChartAccount $chart_of_account)
    {
        try
        {
            DB::beginTransaction();
            $chart_of_account->delete();
            DB::commit();
            return response()->json(['success'=> 'Chart Account deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'ChartAccount');
        }
    }
}
