<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\FinancialYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Masters\{StoreFinancialYearRequest,UpdateFinancialYearRequest};


class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financial_years = FinancialYear::latest()->get();
        $months = config('default_data.months');
        return view('admin.masters.financial-year')->with(['financial_years'=> $financial_years,'months'=> $months]);
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
    public function store(StoreFinancialYearRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            FinancialYear::create( Arr::only( $input, FinancialYear::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Financial Year created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'FinancialYear');
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
    public function edit(FinancialYear $financial_year)
    {
        if ($financial_year)
        {

            $startmonthHtml = '<span>
            <option value="">--Select Zone --</option>';
            foreach(config('default_data.months') as $month):
                $is_select = $month['id'] == $financial_year->start_month ? "selected" : "";
                $startmonthHtml .= '<option value="'.$month['id'].'" '.$is_select.'>'.$month['name'].'</option>';
            endforeach;
            $startmonthHtml .= '</span>';

            $endmonthHtml = '<span>
            <option value="">--Select Zone --</option>';
            foreach(config('default_data.months') as $month):
                $is_select = $month['id'] == $financial_year->end_month ? "selected" : "";
                $endmonthHtml .= '<option value="'.$month['id'].'" '.$is_select.'>'.$month['name'].'</option>';
            endforeach;
            $endmonthHtml .= '</span>';


            $response = [
                'result' => 1,
                'financial_year' => $financial_year,
                'startmonthHtml' => $startmonthHtml,
                'endmonthHtml' => $endmonthHtml,
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
    public function update(UpdateFinancialYearRequest $request, FinancialYear $financial_year)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['from_date'] = $input['edit_from_date'];
            $input['to_date'] = $input['edit_to_date'];
            $input['status'] = $input['edit_status'];
            $input['start_month'] = $input['edit_start_month'];
            $input['end_month'] = $input['edit_end_month'];
            $input['month_status'] = $input['edit_month_status'];
            $financial_year->update( Arr::only( $input, FinancialYear::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Financial Year updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Financial Year');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialYear $financial_year)
    {
        try
        {
            DB::beginTransaction();
            $financial_year->delete();
            DB::commit();
            return response()->json(['success'=> 'FinancialYear deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'FinancialYear');
        }
    }
}
