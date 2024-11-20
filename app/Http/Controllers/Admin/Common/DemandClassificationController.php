<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandClassification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreDemandClassificationRequest, UpdateDemandClassificationRequest};

class DemandClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demand_classifications = DemandClassification::latest()->get();
        return view('admin.common.demand-classification')->with(['demand_classifications' => $demand_classifications]);
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
    public function store(StoreDemandClassificationRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            DemandClassification::create(Arr::only($input, DemandClassification::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Demand Classification created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Demand Classification');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DemandClassification $demand_classification)
    {
        if ($demand_classification) {
            $response = [
                'result' => 1,
                'demand_classification' => $demand_classification,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandClassification $demand_classification)
    {
        if ($demand_classification) {
            $response = [
                'result' => 1,
                'demand_classification' => $demand_classification,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandClassificationRequest $request, DemandClassification $demand_classification)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $demand_classification->update(Arr::only($input, DemandClassification::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Demand Classification updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'DemandClassification');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandClassification $demand_classification)
    {
        try {
            DB::beginTransaction();
            $demand_classification->delete();
            DB::commit();
            return response()->json(['success' => 'Demand Classification deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'DemandClassification');
        }
    }
}
