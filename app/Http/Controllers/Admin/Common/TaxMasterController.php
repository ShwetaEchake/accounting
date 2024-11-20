<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxMaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreTaxMasterRequest,UpdateTaxMasterRequest};

class TaxMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tax_masters = TaxMaster::latest()->get();
        return view('admin.common.tax-master')->with(['tax_masters'=> $tax_masters]);
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
    public function store(StoreTaxMasterRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            TaxMaster::create( Arr::only( $input, TaxMaster::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Tax Master created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Tax Master');
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
    public function edit(TaxMaster $tax_master)
    {
        if ($tax_master)
        {
            $response = [
                'result' => 1,
                'tax_master' => $tax_master,
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
    public function update(UpdateTaxMasterRequest $request, TaxMaster $tax_master)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $tax_master->update( Arr::only( $input, TaxMaster::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'TaxMaster updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'TaxMaster');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxMaster $tax_master)
    {
        try
        {
            DB::beginTransaction();
            $tax_master->delete();
            DB::commit();
            return response()->json(['success'=> 'TaxMaster deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'TaxMaster');
        }
    }
}
