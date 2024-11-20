<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\{StoreMasterRequest, UpdateMasterRequest};
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masters = Master::latest()->get();

        return view('admin.masters.masters')->with(['masters' => $masters]);
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
    public function store(StoreMasterRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Master::create(Arr::only($input, Master::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Master created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Master');
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
    public function edit(Master $master)
    {
        if ($master) {
            $response = [
                'result' => 1,
                'master' => $master,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterRequest $request, Master $master)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $master->update(Arr::only($input, Master::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Master updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Master');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master $master)
    {
        try {
            DB::beginTransaction();
            $master->delete();
            DB::commit();

            return response()->json(['success' => 'Master deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Master');
        }
    }
}
