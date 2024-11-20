<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreTaxGroupRequest,UpdateTaxGroupRequest};


class TaxGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tax_groups = TaxGroup::latest()->get();
        return view('admin.common.tax-group')->with(['tax_groups'=> $tax_groups]);
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
    public function store(StoreTaxGroupRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            TaxGroup::create( Arr::only( $input, TaxGroup::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Tax Group created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Tax Group');
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
    public function edit(TaxGroup $tax_group)
    {
        if ($tax_group)
        {
            $response = [
                'result' => 1,
                'tax_group' => $tax_group,
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
    public function update(UpdateTaxGroupRequest $request, TaxGroup $tax_group)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $tax_group->update( Arr::only( $input, TaxGroup::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'TaxGroup updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'TaxGroup');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxGroup $tax_group)
    {
        try
        {
            DB::beginTransaction();
            $tax_group->delete();
            DB::commit();
            return response()->json(['success'=> 'TaxGroup deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'TaxGroup');
        }
    }
}
