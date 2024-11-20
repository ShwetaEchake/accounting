<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\ComponentName;
use App\Http\Requests\Admin\Common\{StoreComponentNameRequest,UpdateComponentNameRequest};

class ComponentNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $component_names = ComponentName::latest()->get();
        return view('admin.common.component-name')->with(['component_names'=> $component_names]);
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
    public function store(StoreComponentNameRequest $request)
    {
        // try
        // {
            DB::beginTransaction();
            $input = $request->validated();
            ComponentName::create( Arr::only( $input, ComponentName::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Component name created successfully!']);
        // }
        // catch(\Exception $e)
        // {
        //     return $this->respondWithAjax($e, 'creating', 'ComponentName');
        // }
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
    public function edit(ComponentName $component_name)
    {
        if ($component_name)
        {
            $response = [
                'result' => 1,
                'component_name' => $component_name,
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
    public function update(UpdateComponentNameRequest $request, ComponentName $component_name)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $component_name->update( Arr::only( $input, ComponentName::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Component name updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'ComponentName');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComponentName $component_name)
    {
        try
        {
            DB::beginTransaction();
            $component_name->delete();
            DB::commit();
            return response()->json(['success'=> 'Component name deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'ComponentName');
        }
    }
}
