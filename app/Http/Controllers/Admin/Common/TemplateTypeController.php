<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemplateType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreTemplateTypeRequest,UpdateTemplateTypeRequest};


class TemplateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $template_types = TemplateType::latest()->get();
        return view('admin.common.template-type')->with(['template_types'=> $template_types]);
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
    public function store(StoreTemplateTypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            TemplateType::create( Arr::only( $input, TemplateType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Template Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Template Type');
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
    public function edit(TemplateType $template_type)
    {
        if ($template_type)
        {
            $response = [
                'result' => 1,
                'template_type' => $template_type,
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
    public function update(UpdateTemplateTypeRequest $request, TemplateType $template_type)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $template_type->update( Arr::only( $input, TemplateType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Template Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'TemplateType');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateType $template_type)
    {
        try
        {
            DB::beginTransaction();
            $template_type->delete();
            DB::commit();
            return response()->json(['success'=> 'Template Type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'TemplateType');
        }
    }
}
