<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreOrganizationRequest, UpdateOrganizationRequest};

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::latest()->get();
        return view('admin.common.organizations')->with(['organizations' => $organizations]);
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
    public function store(StoreOrganizationRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Organization::create(Arr::only($input, Organization::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Organization created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Organization');
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
    public function edit(Organization $organization)
    {
        if ($organization) {
            $response = [
                'result' => 1,
                'organization' => $organization,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $organization->update(Arr::only($input, Organization::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Organization updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Organization');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        try {
            DB::beginTransaction();
            $organization->delete();
            DB::commit();
            return response()->json(['success' => 'Organization deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Organization');
        }
    }
}
