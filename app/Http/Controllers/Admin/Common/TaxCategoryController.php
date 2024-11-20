<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreTaxCategoryRequest, UpdateTaxCategoryRequest};

class TaxCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tax_categories = TaxCategory::latest()->get();
        return view('admin.common.tax-category')->with(['tax_categories' => $tax_categories]);
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
    public function store(StoreTaxCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            TaxCategory::create(Arr::only($input, TaxCategory::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Tax Category created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Tax Category');
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
    public function edit(TaxCategory $tax_category)
    {
        if ($tax_category) {
            $response = [
                'result' => 1,
                'tax_category' => $tax_category,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxCategoryRequest $request, TaxCategory $tax_category)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $tax_category->update(Arr::only($input, TaxCategory::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Tax Category updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'TaxCategory');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxCategory $tax_category)
    {
        try {
            DB::beginTransaction();
            $tax_category->delete();
            DB::commit();
            return response()->json(['success' => 'Tax Category deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'TaxCategory');
        }
    }
}
