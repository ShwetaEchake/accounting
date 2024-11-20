<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreUnitRequest,UpdateUnitRequest};

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::latest()->get();
        return view('admin.common.units')->with(['units'=> $units]);
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
    public function store(StoreUnitRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Unit::create( Arr::only( $input, Unit::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Unit created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Unit');
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
    public function edit(Unit $unit)
    {
        if ($unit)
        {
            $response = [
                'result' => 1,
                'unit' => $unit,
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
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unit->update( Arr::only( $input, Unit::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Unit updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Unit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        try
        {
            DB::beginTransaction();
            $unit->delete();
            DB::commit();
            return response()->json(['success'=> 'Unit deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Unit');
        }
    }
}
