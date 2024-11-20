<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicableAt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreApplicableAtRequest,UpdateApplicableAtRequest};

class ApplicableAtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicable_at = ApplicableAt::latest()->get();
        return view('admin.common.applicable-at')->with(['applicable_at'=> $applicable_at]);
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
    public function store(StoreApplicableAtRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ApplicableAt::create( Arr::only( $input, ApplicableAt::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'ApplicableAt created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'ApplicableAt');
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
    public function edit(ApplicableAt $applicable_at)
    {
        if ($applicable_at)
        {
            $response = [
                'result' => 1,
                'applicable_at' => $applicable_at,
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
    public function update(UpdateApplicableAtRequest $request, ApplicableAt $applicable_at)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $applicable_at->update( Arr::only( $input, ApplicableAt::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'ApplicableAt updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'CalculationMethod');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicableAt $applicable_at)
    {
        try
        {
            DB::beginTransaction();
            $applicable_at->delete();
            DB::commit();
            return response()->json(['success'=> 'ApplicableAt deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'ApplicableAt');
        }
    }
}
