<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalculationMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreCalculationMethodRequest,UpdateCalculationMethodRequest};

class CalculationMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calculation_methods = CalculationMethod::latest()->get();
        return view('admin.common.calculation-method')->with(['calculation_methods'=> $calculation_methods]);
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
    public function store(StoreCalculationMethodRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            CalculationMethod::create( Arr::only( $input, CalculationMethod::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Calculation Method created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'CalculationMethod');
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
    public function edit(CalculationMethod $calculation_method)
    {
        if ($calculation_method)
        {
            $response = [
                'result' => 1,
                'calculation_method' => $calculation_method,
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
    public function update(UpdateCalculationMethodRequest $request, CalculationMethod $calculation_method)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $calculation_method->update( Arr::only( $input, CalculationMethod::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'CalculationMethod updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'CalculationMethod');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalculationMethod $calculation_method)
    {
        try
        {
            DB::beginTransaction();
            $calculation_method->delete();
            DB::commit();
            return response()->json(['success'=> 'CalculationMethod deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'CalculationMethod');
        }
    }
}
