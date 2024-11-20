<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreVoucherTypeRequest,UpdateVoucherTypeRequest};


class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voucher_types = VoucherType::latest()->get();
        return view('admin.common.voucher-type')->with(['voucher_types'=> $voucher_types]);
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
    public function store(StoreVoucherTypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            VoucherType::create( Arr::only( $input, VoucherType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Voucher Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Voucher Type');
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
    public function edit(VoucherType $voucher_type)
    {
        if ($voucher_type)
        {
            $response = [
                'result' => 1,
                'voucher_type' => $voucher_type,
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
    public function update(UpdateVoucherTypeRequest $request, VoucherType $voucher_type)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $voucher_type->update( Arr::only( $input, VoucherType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Voucher Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'VoucherType');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoucherType $voucher_type)
    {
        try
        {
            DB::beginTransaction();
            $voucher_type->delete();
            DB::commit();
            return response()->json(['success'=> 'Voucher Type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'VoucherType');
        }
    }
}
