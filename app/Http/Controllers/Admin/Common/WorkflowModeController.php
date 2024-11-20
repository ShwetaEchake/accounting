<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkflowMode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreWorkflowModeRequest,UpdateWorkflowModeRequest};

class WorkflowModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workflow_modes = WorkflowMode::latest()->get();
        return view('admin.common.workflow-mode')->with(['workflow_modes'=> $workflow_modes]);
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
    public function store(StoreWorkflowModeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            WorkflowMode::create( Arr::only( $input, WorkflowMode::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'WorkflowMode created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'WorkflowMode');
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
    public function edit(WorkflowMode $workflow_mode)
    {
        if ($workflow_mode)
        {
            $response = [
                'result' => 1,
                'workflow_mode' => $workflow_mode,
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
    public function update(UpdateWorkflowModeRequest $request, WorkflowMode $workflow_mode)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $workflow_mode->update( Arr::only( $input, WorkflowMode::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Workflow Mode updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'WorkflowMode');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkflowMode $workflow_mode)
    {
        try
        {
            DB::beginTransaction();
            $workflow_mode->delete();
            DB::commit();
            return response()->json(['success'=> 'Workflow Mode deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'WorkflowMode');
        }
    }
}
